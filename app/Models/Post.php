<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'elynx_posts';
    protected $fillable = ['title', 'author', 'slug', 'body'];
}