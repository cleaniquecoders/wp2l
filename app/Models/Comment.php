<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $casts   = [
        'author_avatar_urls' => 'array',
    ];
}
