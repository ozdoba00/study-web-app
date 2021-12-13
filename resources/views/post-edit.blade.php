@extends('layouts.app')

@section('post-edit')
<div class="card">
    <div class="card-body">
        <form action="{{route('post.update', $post->id)}}" method="post" id="post-form">
            {{ method_field('PUT') }}
            @csrf
            <div class="input-group mb-3">
                @if(Auth::user()->avatar)
            <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 40px;height: 40px; padding: 5px;">
            @endif
                <textarea style='max-height:100px;' class="form-control"name='postContent' placeholder="How are you, {{Auth::user()->name}}?" rows="3">{{$post->content}}</textarea>
                <input class="btn btn-primary me-md-2" type="submit" value="Edit">
            </div>
        </form>
    </div>
</div>

@endsection
