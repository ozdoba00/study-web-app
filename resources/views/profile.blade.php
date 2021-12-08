@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



@section('profile')


            <div class="card">
                <div class="card-body">
                    <h3 style="text-align: center;">Profile settings</h3>
                    <form action="{{route('profile.update-data')}}" method="POST" id="post-form" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group row">
                            <label for="first-name" class="col-md-4 col-form-label text-md-right">First name</label>

                            <div class="col-md-6">
                                <input id="first-name" type="text" class="form-control" name="firstName" required autocomplete value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="second-name" class="col-md-4 col-form-label text-md-right">Second name</label>

                            <div class="col-md-6">
                                <input id="second-name" type="text" class="form-control" name="secondName" value="{{$user->second_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last-name" class="col-md-4 col-form-label text-md-right">Last name</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control" name="lastName" required autocomplete value="{{$user->last_name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last-name" class="col-md-4 col-form-label text-md-right">Avatar</label>

                            <div class="col-md-6">
                                <input name='avatar_img' class="form-control" id="formFileSm" type="file">
                            </div>
                        </div>

                        <br>
                        @if(Auth::user()->avatar)
                        <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update data
                                </button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('profile.reset-password') }}">Reset Password</a>
                </div>
            </div>




@endsection
