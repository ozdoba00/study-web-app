<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $userMain = Auth::user();
        $posts = Post::all();
        $likes = Like::all();
        foreach ($posts as $key=>$value) {
            foreach ($likes as $like) {
                if(($like['post_id']==$posts[$key]['id'])&&($like['user_id']==Auth::user()->id)){
                    $posts[$key]['liked'] = true;
                }
            }
            $user = User::find($value->user_id);
            $posts[$key]['user_name'] = $user->name;
            $posts[$key]['user_last_name'] = $user->last_name;
            $posts[$key]['avatar'] = User::find($value->user_id)->avatar;
        }

        if(sizeof($posts)<1)
            return view('home', ['user'=>$userMain, 'posts'=>$posts->reverse()]);
        else
        return view('home', ['user'=>$userMain, 'userProfile'=>$user, 'posts'=>$posts->reverse()]);



    }
}
