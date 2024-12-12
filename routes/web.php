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

Route::get('/posts/{slug}', function($slug){
    $value = Post::find($slug);

    return view('value', ['title' => 'Article Detail', 'value' => $value]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Reach Us']);
});