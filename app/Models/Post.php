<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use \Spatie\Tags\HasTags;

    protected $guarded = ['id'];

    public static function getTagClassName(): string
    {
        return \App\Models\Tag::class;
    }
}
