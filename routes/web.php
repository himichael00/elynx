<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{value:slug}', function(Post $value){
    return view('value', ['title' => 'Article Detail', 'result' => $value]);
});

Route::get('/authors/{user:username}', function(User $user){
    return view('posts', ['title' => 'Articles By ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/category/{category:slug}', function(Category $category){
    return view('posts', ['title' => 'Category In ' . $category->category_title, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Reach Us']);
});