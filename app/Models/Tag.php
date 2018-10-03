<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends \Spatie\Tags\Tag
{
    public static function findFromString(string $name, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where(\DB::raw( "json_extract(name, '$." . $locale . "')" ), '=', $name)
            ->where('type', $type)
            ->first();
    }
}
