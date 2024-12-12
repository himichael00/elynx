<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function all() {
        return [
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
    }

    public static function find($slug):array {
        // to check if requested slug is the same slug on database
        $value = Arr::first(static::all(), function($value) use ($slug) {
            // if true, then return the entire matching array
            return $value['slug'] == $slug;
        });

        // if no matching array found a.k.a null value then abort
        if (!$value) {
            abort(404);
        }
        return $value;
    }
}
?>