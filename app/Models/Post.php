<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'elynx_posts';
    // to define what column allowed to fill
    protected $fillable = ['title', 'author', 'slug', 'body'];
}