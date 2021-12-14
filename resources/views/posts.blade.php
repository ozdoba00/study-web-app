
@section('posts')
<section class="all-posts">


    @foreach ($posts as $post)
    {{-- @dd($post) --}}
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
            <a href="{{route('post.edit', $post->id)}}" class="post-delete-button" >Edit</a>

            <a href="{{url('/post', [$post->id, 'remove'])}}" class="post-delete-button" >Delete</a>


            @endif

            </div>
            <div class='d-flex'>
                <p>{{$post->content}}</p>
            </div>
            <div class="like">


             <i id='{{$post->id}}' onclick="myFunction(this)" @if (!$post->liked)

             class="fa fa-thumbs-up" @endif @if($post->liked) class='fa fa-thumbs-up fa-thumbs-down' @endif><span id='{{$post->id}}' class="like-text">
            @if (!$post->liked)
                I like it!
            @endif
            @if ($post->liked)
                I don't like it
            @endif
        </span>
            </i>
            </div>
            <hr>
            <form action="{{route('comment.store')}}" method="post" id="comment-form-{{$post->id}}">
                @csrf
                <div style="width:100%;"  class="input-group mb-3">
                    <textarea style='max-height:50px;' class="form-control" id='comment_content-{{$post->id}}' name='comment_content' placeholder="What do you think about it, {{$user->name}}?" rows="3"></textarea>
                    <button id="{{$post->id}}" class="add-comment btn btn-primary me-md-2">Comment</button>
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

    <script>

        $("#posts-alert").hide();
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        function myFunction(x) {

            // console.log(x.attr);
            // console.log(x.classList[2]);

            if(x.classList[2]!='fa-thumbs-down'){
                let userId = JSON.parse("{{ json_encode(Auth::user()->id) }}");
                $.ajax({
                    type: "post",
                    url: "/like",
                    data: {post_id: x.id, user_id: userId},
                    success: function (response) {
                        x.textContent = "I don't like it";

                    }
                });
            }else{
                let userId = JSON.parse("{{ json_encode(Auth::user()->id) }}");
                $.ajax({
                    type: "post",
                    url: "/like/remove",
                    data: {post_id: x.id, user_id: userId},
                    success: function (response) {
                        x.textContent = "I like it!";
                    }
                });
            }
        x.classList.toggle("fa-thumbs-down");
        }

    </script>

    @endforeach

</section>
@endsection

