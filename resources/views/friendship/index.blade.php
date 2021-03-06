@extends ('layouts.master')

@section('content')

    @include('layouts.message')
    
    <section id="profile-show">
        <div class="container">
        @include('profile.profile')
        </div>
    </section>

    <section id="friends-index">
        <div class="container">
            @can('viewProfile', $user)
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="friends-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="friends-accepted-tab" data-toggle="tab" href="#friends-accepted" role="tab" aria-controls="friends-accepted" aria-selected="true">Manage friends</a>
                        </li>
                        @can('manageFriendship',$user)
                            <li class="nav-item">
                                <a class="nav-link" id="friends-request-tab" data-toggle="tab" href="#friends-request" role="tab" aria-controls="friends-request" aria-selected="false">Recieved invites</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="friends-pendent-tab" data-toggle="tab" href="#friends-pendent" role="tab" aria-controls="friends-pendent" aria-selected="false">Requested invites</a>
                            </li>
                        @endcan
                    </ul>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="friends-tab-content">
                        <div class="tab-pane fade show active" id="friends-accepted" role="tabpanel" aria-labelledby="friends-accepted-tab">
                            @include('friendship.friends')
                        </div>
                        @can('manageFriendship',$user)
                            <div class="tab-pane fade" id="friends-request" role="tabpanel" aria-labelledby="friends-request-tab"></div>
                            <div class="tab-pane fade" id="friends-pendent" role="tabpanel" aria-labelledby="friends-pendent-tab"></div>
                        @endcan
                    </div>
                </div>
            </div>

            @else
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto text-center mt-4">
                    <h4> Only friends of {{ $user->name }} can view posts</h4>
                </div>
            </div>
            @endcan
        </div>
    </section>
    

    @can('manageFriendship',$user)
        @include('friendship.manage')
    @endcan
    
    @can('editProfile', $user)
        @include('profile.edit')
    @endcan

@endsection