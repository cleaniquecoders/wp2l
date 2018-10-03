<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use \Spatie\Tags\HasTags;

    protected $guarded = ['id'];
}
