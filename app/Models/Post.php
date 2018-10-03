<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Spatie\Tags\HasTags;

    protected $guarded = [];

    public static function getTagClassName(): string
    {
        return \App\Models\Tag::class;
    }

    /**
     * The user that belongs to the post.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * The categories that belong to the post.
     */
    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class, 'post_category');
    }

    /**
     * The comments that belong to the post.
     */
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * @param array
     *
     * @return $this
     */
    public function attachCategories($categories)
    {
        $this->categories()->syncWithoutDetaching($categories);

        return $this;
    }

    public function scopeWithDetails($query)
    {
        return $query->with('user', 'tags', 'categories', 'comments');
    }
}
