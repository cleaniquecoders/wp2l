<?php

namespace App\Models;

use App\Traits\HasMediaExtended;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasMediaExtended;

    protected $guarded = [];
}
