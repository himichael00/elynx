<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    // to define tables_name
    protected $table = 'elynx_post_categories';
    // to define what column allowed to fill
    protected $fillable = [
        'category_title',
        'slug'
    ];

    // function name should be similliar same as the foreign key column on this table
    // in this case function 'author' same as 'author_id' column
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
