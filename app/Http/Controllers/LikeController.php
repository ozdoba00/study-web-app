<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{

    public function index(){
        return "a";
    }

    public function store(Request $request){

        $like = new Like();

        $like->post_id = $request->post_id;
        $like->user_id = $request->user_id;
        $like->save();

        // return $like;
    }


    public function remove(Request $request){

        $likes = Like::all();


        foreach ($likes as $value) {
            if(($value['user_id']==$request->user_id) &&($value['post_id']==$request->post_id))
                $like = $value;

        }

        $like->delete();


    }
}
