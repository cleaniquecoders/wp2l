<?php

namespace App\Services\WordPress;

class MergeCategoryService
{
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getCategoriesContent()
    {
        $content          = file_get_contents($this->path);
        $this->categories = collect(json_decode($content));
    }

    public function handle()
    {
        $this->getCategoriesContent();

        foreach ($this->categories as $tag) {
            \App\Models\Category::create([
                'id'   => $tag->id,
                'name' => $tag->name,
                'slug' => $tag->slug,
            ]);
        }
    }
}
