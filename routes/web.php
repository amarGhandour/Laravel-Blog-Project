<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::with('category', 'user')->get()
    ]);
});

Route::get('/post/{post}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts->load('category', 'user')
    ]);
});

Route::get('/user/{user:username}', function (User $user) {
    return view('posts', [
        'posts' => $user->posts->load('category', 'user')
    ]);
});



