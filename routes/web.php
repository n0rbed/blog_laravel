<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function() {
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('home');
});

Route::post('/login',[UserController::class, 'login']);
Route::post('/signup',[UserController::class, 'signup']);
Route::post('/logout',[UserController::class, 'logout']);

Route::post('/create-post',[PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class,'showEditForm']);
Route::put('/edit-post/{post}', [PostController::class,'editPost']);


Route::delete('/delete-post/{post}', [PostController::class,'deletePost']);
