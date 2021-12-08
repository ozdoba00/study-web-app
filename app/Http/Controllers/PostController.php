<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = new Post();
        $posts = $post->all()->reverse();

        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post();

        $postContent = $request->input('postContent');
        $user = Auth::user();
        $userId = $user->id;
        $visibility = 1; //na razie stala

        // Add to database
        $post->content =$postContent;
        $post->user_id = $userId;
        $post->visibility = $visibility;
        $post->likes = 0;
        $post->save();

        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        $user = Auth::user();

        $comments = $post->comments;
        foreach ($comments as $key =>$value) {

            $comments[$key]['user_name'] = User::find($value['user_id'])->name;
            $comments[$key]['last_name'] = User::find($value['user_id'])->last_name;
            $comments[$key]['avatar'] = User::find($value['user_id'])->avatar;

            if($user->id==$value['user_id'])
            $comments[$key]['can_be_deleted'] = 1;
            else
            $comments[$key]['can_be_deleted'] = 0;



        }

        return $comments;
        // echo $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }
}
