<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::resource('post', PostController::class);
Route::get('/post/{id}/remove', 'PostController@destroy');
Route::resource('comment', CommentController::class);
Route::resource('user', UserController::class);

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/reset-password', ['uses'=>"ProfileController@resetPassword", 'as'=>'profile.reset-password']);
Route::put('/profile/update-data', ['uses'=>"ProfileController@update", 'as'=>'profile.update-data']);

