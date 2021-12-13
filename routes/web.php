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
        'posts' => Post::with('category', 'user')->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/post/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post,
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts->load('category', 'user'),
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('posts', [
        'posts' => $user->posts->load('category', 'user'),
        'categories' => Category::all()
    ]);
});



