<?php

use App\Models\Post;
use Illuminate\Support\Arr;
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

Route::get('/contact', function () {
    return view('contact', ['title' => 'Reach Us']);
});