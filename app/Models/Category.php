<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * The posts that belong to the category.
     */
    public function posts()
    {
        return $this->belongsToMany(\App\Models\Post::class, 'post_category');
    }
}
