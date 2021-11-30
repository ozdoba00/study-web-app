@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/posts.js') }}" defer></script>
<script src="{{ asset('js/comments.js') }}" defer></script>



@section('content')
<div class="container">
    <div class="row align-items-center">
        <section class="col-3 left">

        </section>
        <section style="max-width: 50%;" class="col main">
            <div class="card">
                <div class="card-body">
                    <form action="/post" method="post" id="post-form">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <p>IMG</p>
                            </div>
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


<section class="all-posts">


    @foreach ($posts as $post)
    <div id={{$post->id}} class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    {{-- <img src="..." alt="..."> --}}
                </div>
                <div class="flex-grow-1 ms-3">
                    <span class="user-data"><a href="#"> {{$post->user_name}} {{$post->user_last_name}}</a></span>
                </div>
            <p>{{$post->created_at}}</p>
            </div>
            <div class='d-flex'>
                <p>{{$post->content}}</p>
            </div>
            <form action="{{route('comment.store')}}" method="post" id="comment-form-{{$post->id}}">
                @csrf
                <div style="width:100%;"  class="input-group mb-3">
                    <textarea style='max-height:50px;' class="form-control" id='comment_content-{{$post->id}}' name='comment_content' placeholder="What do you think about it, {{$user->name}}?" rows="3"></textarea>
                    <button id="{{$post->id}}" class="add-comment btn btn-primary me-md-2">Add</button>
                    <input type="hidden" name="post_id" value={{$post->id}}>
                </div>

            </form>

            <div id={{$post->id}} class="comment-button d-flex">
                Show comments
            </div>

            <div id='list-{{$post->id}}' class="comments-list d-none">
            </div>

        </div>
    </div>

    @endforeach
</section>
</section>
<section class="col-3 chat">

</section>
</div>
</div>
<script>
    $("#posts-alert").hide();
</script>
@endsection



