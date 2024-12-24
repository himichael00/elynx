<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeFilter(Builder $query, array $filters): void
    {
        // if such a 'search' is not null, function callback will be executed
        // and if executed it will do a query 'WHERE' on $search
        $query->when(isset($filters['search']) ? $filters['search'] : false, function($query, $search) {
            $query->where('title', 'like', '%'. $search . '%');
        });

            /* === EXISTS QUERY SECTION === */

            // when we go inside a category, this query will be executed since we neeed to find data inside category same goes on the others
            $query->when(isset($filters['category']) ? $filters['category'] : false, function($query, $category) {
                $query->whereHas('category', function($query) use ($category) {
                    $query->where('slug', $category);
                });
            });

            $query->when(isset($filters['authors']) ? $filters['authors'] : false, function ($query, $author) {
                $query->whereHas('author', function($query) use ($author) {
                    $query->where('username', $author);
                });
            });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
