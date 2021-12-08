@extends('layouts.app')



@section('content')
            <div class="card">
                <div class="card-body">
                    <form action="/post" method="post" id="post-form">
                        @csrf
                        <div class="input-group mb-3">
                            @if(Auth::user()->avatar)
                        <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 40px;height: 40px; padding: 5px;">
                        @endif
                            <input type="text" class="form-control" name='postContent'
                                placeholder="How are you, {{$user->name}}?">
                                <input class="btn btn-primary me-md-2" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>

            <div class="alert alert-success" id="posts-alert"role="alert">
              <h4 id='post-text-alert' style="text-align: center"></h4>
            </div>
@include('posts')

<script>
    $("#posts-alert").hide();
</script>
@endsection



