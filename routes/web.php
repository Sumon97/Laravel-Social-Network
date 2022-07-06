<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;

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

/*

Route::get('/', function () {
    return view('welcome');
});

*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::resource('/friend', FriendsController::class);

route::post('/friend', [App\Http\Controllers\FriendsController::class, 'store'])->name('friend.index');

route::post('/friend/{friend}', [App\Http\Controllers\FriendsController::class, 'update'])->name('friend.update');




// Post Controller 

Route::resource('/Post', PostsController::class);




// Like Controller 

Route::resource('/Like', LikesController::class);




// Comments Controller 

Route::resource('/Comment', CommentsController::class);

Route::resource('/Profile', ProfileController::class);

route::post('/Profile/update', [App\Http\Controllers\ProfileController::class, 'Userupdate']);



Route::get('/Profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('Profile.show');