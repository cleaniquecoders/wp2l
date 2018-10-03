<?php

namespace App\Models;

use App\Traits\HasMediaExtended;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class File extends Model implements HasMedia
{
    use HasMediaExtended;

    protected $guarded = [];
}
