@extends('layouts.app')

@section('profile-info')
<div class="profile">
               <div class="profile-header">

                  <div class="profile-header-cover"></div>

                  <div class="profile-header-content">

                     <div class="profile-header-img">
                        <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" >

                     </div>

                     <div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5">{{$user->name}} {{$user->last_name}}</h4>
                        @if($user->birth_date)
                        <p class="m-b-10">Born <i> {{$user->birth_date}}</i></p>

                        @endif
                        @if ($user->gender!='none')
                            <p class="m-b-10">Gender <i>{{ucfirst($user->gender)}}</i></p>
                        @endif
                        @if ($user->short_info)
                        <div style="max-width: 50%;">
                            <p>
                                {{$user->short_info}}
                            </p>

                        </div>
                        @endif
                        {{-- <a href="#" class="btn btn-sm btn-info mb-2">Edit Profile</a> --}}
                     </div>

                  </div>

                  {{-- <ul class="profile-header-tab nav nav-tabs">
                     <li class="nav-item"><a href="#profile-post" class="nav-link active show" data-toggle="tab">POSTS</a></li>
                  </ul> --}}

               </div>
            </div>
@endsection


@section('user-profile')

    @if ($isUsersLoggedProfile)

        <div class="card">
            <div class="card-body">
                <form action="/post" method="post" id="post-form">
                    @csrf
                    <div class="input-group mb-3">
                        @if(Auth::user()->avatar)
                        <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->avatar)}}"
                            alt="profile_image" style="width: 40px;height: 40px; padding: 5px;">
                        @endif
                        <textarea style='max-height:70px;' class="form-control" name='postContent'
                            placeholder="How are you, {{Auth::user()->name}}?" rows="3"></textarea>
                        <input class="btn btn-primary me-md-2" type="submit" value="Add">
                    </div>
                </form>
            </div>
        </div>
    @endif
    <div class="alert alert-success" id="posts-alert" role="alert">
        <h4 id='post-text-alert' style="text-align: center"></h4>
    </div>
    <script>
        $("#posts-alert").hide();
    </script>

@endsection
@include('posts')
