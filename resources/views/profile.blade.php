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
                        <div class="form-group row">
                            <label for="Birt date" class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control" value="{{$user->birth_date}}" name="birth" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" @if ($user->gender=='male')checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female"@if ($user->gender=='female')checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="none"@if ($user->gender=='none')checked @endif>
                                    <label class="form-check-label" for="inlineRadio3">I don't want to show</label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_info" class="col-md-4 col-form-label text-md-right">{{ __('Short informations') }}</label>

                            <div class="col-md-6">
                                <textarea style='max-height:70px;' maxlength="200" class="form-control" name='short_info' placeholder="Write something about you, {{Auth::user()->name}}." rows="3">{{$user->short_info}}</textarea>

                            </div>
                        </div>
                        <br>
                        @if(Auth::user()->avatar)
                        <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
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
