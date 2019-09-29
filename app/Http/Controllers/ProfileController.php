<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserImage;
use App\User;
use Intervention\Image\Facades\Image;
use Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->latest()->get();

        return view('profile.show', compact('posts'), compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUser  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $user = User::where('email',$request->input('email'))->first();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->phone = $request->input('phone');
        $user->birthday = $request->input('birthday');
        $user->sex = $request->input('sex');
        $user->bio = $request->input('bio');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return json_encode($user);
    }

    /**
     * Update the user's profile image.
     *
     * @param  UpdateUserImage  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateImage(UpdateUserImage $request, User $user)
    {
        // Verify if a file is present and upload it in case
        $path = $user->image_url;

        if ($request->hasFile('user-image')) {
            if ($request->file('user-image')->isValid()) {
                
                if ($path != 'profile-images/default.png'){
                    Storage::delete($path);
                }

                $resize = file_get_contents($request->file('user-image')->getRealPath());
                $hash = md5($resize.$user->id);

                $path = 'profile-images/'.$hash.'.'.$request->file('user-image')->getClientOriginalExtension();;

                Storage::put($path, $resize);

                $user->image_url = Storage::url($path);
                $user->save();

                $request->session()->flash('message', 'Profile picture succesfully updated.');
                $request->session()->flash('type', 'success');
            }
        }

        return back();
    }
}
