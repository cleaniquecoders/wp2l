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
     * The categories that belong to the post.
     */
    public function categories()
    {
        $this->belongsToMany(\App\Models\Category::class, 'post_category');
    }
}
