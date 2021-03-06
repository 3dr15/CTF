@extends ('layouts.master')

@section('content')

    @include('layouts.message')

    <section id="posts">
        <div class="container">

            <!-- Publish a Post -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                @include('post.create')
                </div>
            </div>

            <!-- Post listing -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                @if(!$posts->isEmpty())

                    @foreach($posts as $post)
                        @include('post.post')

                        <div id="comments-{{ $post->id }}" class="container-fluid rounded text-white mb-2 comments">
                            @if(!$post->oldestComments->isEmpty())
                                @foreach($post->oldestComments as $comment)
                                    @include('comment.comment')
                                @endforeach
                                <a class="comments-loader" data-postid="{{ $post->id }}" role="button">
                                    <p class="social-button my-3 text-center">More comments</p>
                                </a>
                            @endif
                        </div>
                        @include('comment.create')
                    @endforeach

                @else
                    <p class="my-5 text-center">No posts yet</p>
                @endif
                </div>
            </div>
        </div>
    </section>

    @include('post.edit')
    @include('post.delete')
    @include('post.like_modal')
    @include('comment.edit')
    @include('comment.delete')

@endsection