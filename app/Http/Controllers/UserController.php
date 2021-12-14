<?php

namespace App\Http\Controllers;

use PhpParser\Node\Expr\Empty_;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $posts = User::find($id)->posts;
        $loggedUser = Auth::user();
        $likes = Like::all();


        $birthDate = $loggedUser->birth_date;
        $birthDate =implode('-', array_reverse(explode("-", $birthDate)));

        $loggedUser->birth_date = $birthDate;
        if($loggedUser->id==$id){
            $loggedUserProfile = true;
        }else{
            $loggedUserProfile = false;
        }

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
        if(sizeof($posts)<1){
            $user = User::find($id);
        }

        // if($loggedUser->id==$user->id)
            return view('user-profile', ['user'=>$user, 'isUsersLoggedProfile'=>$loggedUserProfile ,'posts'=>$posts->reverse()]);

        // return view('user-profile');
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
        //
    }
}
