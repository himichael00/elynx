<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'headline-news-1',
            'title' => 'Headline News 1',
            'author' => 'Bloomberg',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, aperiam? Incidunt, labore placeat distinctio velit, dolorem sunt molestias repellat, sed eos recusandae vero! Suscipit quam cupiditate consectetur, neque sapiente quos!'
        ],
        [
            'id' => 2,
            'slug' => 'headline-news-2',
            'title' => 'Headline News 2',
            'author' => 'IGN',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sequi accusantium inventore exercitationem itaque culpa odit laudantium, consequatur officia harum optio vitae eveniet laborum excepturi quae distinctio. Sunt, iusto saepe.'
        ]
    ]]);
});

Route::get('/posts/{slug}', function($slug){
    $posts = [
        [
            'id' => 1,
            'slug' => 'headline-news-1',
            'title' => 'Headline News 1',
            'author' => 'Bloomberg',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, aperiam? Incidunt, labore placeat distinctio velit, dolorem sunt molestias repellat, sed eos recusandae vero! Suscipit quam cupiditate consectetur, neque sapiente quos!'
        ],
        [
            'id' => 2,
            'slug' => 'headline-news-2',
            'title' => 'Headline News 2',
            'author' => 'IGN',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sequi accusantium inventore exercitationem itaque culpa odit laudantium, consequatur officia harum optio vitae eveniet laborum excepturi quae distinctio. Sunt, iusto saepe.'
        ]
    ];

    // to check if requested slug is the same slug on database
    $value = Arr::first($posts, function($value) use ($slug) {
        // if true, then return the entire matching array
        return $value['slug'] == $slug;
    });

    return view('value', ['title' => 'Article Detail', 'value' => $value]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Reach Us']);
});