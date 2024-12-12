<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    //  to define tables_name
    protected $table = 'elynx_posts';
    // to define what column allowed to fill
    protected $fillable = [
        'title', 
        'author', 
        'slug', 
        'body'
    ];
}
