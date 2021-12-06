<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Passwords\PasswordBroker;

class ProfileController extends Controller
{

    public function index(){
        $user = Auth::user();

        $token = app(PasswordBroker::class)->createToken($user);
        return view('auth.passwords.reset', ["user"=>$user, "token"=>$token]);
    }
}
