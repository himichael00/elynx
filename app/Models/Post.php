<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // eager loading
    protected $with = ['author', 'category'];
    //  to define tables_name
    protected $table = 'elynx_posts';
    // to define what column allowed to fill
    protected $fillable = [
        'title',
        'author', 
        'category',
        'slug', 
        'body'
    ];

    // function name should be similliar same as the foreign key column on this table
    // in this case function 'author' same as 'author_id' column
    public function author(): BelongsTo
    {
        // one post can only have one author a.k.a user
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
