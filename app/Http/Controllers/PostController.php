<?php

namespace App\Http\Controllers;

use App\Post;
use Storage;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\User;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();
        if($user->isFriendOf($post->user_id) or $user->id === $post->user_id)
            return view('post.show', compact('post'));
        else
            return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePost $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        // Verify if a file is present and upload it in case
        $path = null;

        if ($request->filled('post-image')) {

                if( $curl = curl_init() ) {
                    curl_setopt($curl, CURLOPT_URL, $request->input('post-image'));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
                    $file = curl_exec($curl);
                    curl_close($curl);
                }
                
                $temppath = '/tmp/'.random_int(10000000,1000000000000);
                file_put_contents($temppath, $file);
                if(explode('/',mime_content_type($temppath))[0]=='image')
                    $ext = '.'.explode('/',mime_content_type($temppath))[1];
                else   
                    $ext = '';
                unlink($temppath);
                $filename = 'post-images/'.random_int(10000000,1000000000000).'_'.explode('.',basename($request->input('post-image')))[0].$ext;
                $path = Storage::put($filename, $file);
                $path = Storage::url($filename);
        }

        // Store a new Post
        auth()->user()->addPost($request->input('post-text'), $path);

        return Redirect::to(URL::previous() . "#content");
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response()->json(['post' => $post, 'user' => $post->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StorePost $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post)
    {
        // Verify if a file is present and upload it in case
        $path = $post->image_url;

        if ($request->hasFile('post-image')) {
            if ($request->file('post-image')->isValid()) {
                Storage::delete($path);
                $path = Storage::putFile(
                    'post-images', $request->file('post-image')
                );
            }
        } else {
            // Removing file from filesystem and from db
            if ($request->filled('remove')) {
                Storage::delete($path);
                $path = null;
            }
        }

        // Update the Post
        $post->text = $request->input('post-text');
        $post->image_url = $path;
        $post->save();

        return redirect()->route('post-show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image_url);
        $post->delete();

        return redirect('home');
    }

}
