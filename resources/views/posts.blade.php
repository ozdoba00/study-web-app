
@section('posts')
<section class="all-posts">


    @foreach ($posts as $post)
    <div id={{$post->id}} class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img class="image rounded-circle" src="{{asset('/storage/images/'.$post->avatar)}}" alt="profile_image" style="width: 35px;height: 35px; padding:5px;">
                </div>
                <div class="flex-grow-1 ms-3">
                    <span class="user-data"><a href="{{route('user.show', $post->user_id)}}"> {{$post->user_name}} {{$post->user_last_name}}</a></span>
                </div>
            <p>{{$post->created_at}}</p>
            @if (Auth::user()->id == $post->user_id)
            <a href="{{url('/post', [$post->id, 'remove'])}}" class="post-delete-button" >Delete</a>
            @endif

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
    <script>
        $("#posts-alert").hide();
    </script>
</section>
@endsection

