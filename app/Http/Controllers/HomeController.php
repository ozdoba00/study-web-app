<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

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
        // $user = Auth::user();
        $posts = Post::all();


        foreach ($posts as $key=>$value) {
            $user = User::find($value->user_id);
            $posts[$key]['user_name'] = $user->name;
            $posts[$key]['user_last_name'] = $user->last_name;
            $posts[$key]['avatar'] = User::find($value->user_id)->avatar;
        }


        return view('home', ['user'=>$user, 'posts'=>$posts->reverse()]);
    }
}
