<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;

class ProfileController extends Controller
{

    public function index(){
        $user = Auth::user();

        // $token = app(PasswordBroker::class)->createToken($user);
        // return view('auth.passwords.reset', ["user"=>$user, "token"=>$token]);

        return view('profile', ['user'=>$user]);
    }

    public function resetPassword(){
        $user = Auth::user();
        $token = app(PasswordBroker::class)->createToken($user);

        return view('auth.passwords.reset', ["token"=>$token]);

    }

    public function update(Request $request){

        $firstName = $request->firstName;
        $secondName = $request->secondName;
        $lastName = $request->lastName;

        $user = Auth::user();

        if($request->avatar_img){
            $filename = $request->avatar_img->getClientOriginalName();
            $request->avatar_img->storeAs('images',$filename,'public');
            $user->avatar = $filename;
        }
        $user->name = $firstName;
        $user->second_name = $secondName;
        $user->last_name = $lastName;
        $user->save();

        return redirect('/profile');

    }
}
