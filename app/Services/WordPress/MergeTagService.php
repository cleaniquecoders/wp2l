<?php

namespace App\Services\WordPress;

class MergeTagService
{
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getTagsContent()
    {
        $content    = file_get_contents($this->path);
        $this->tags = collect(json_decode($content));
    }

    public function handle()
    {
        $this->getTagsContent();

        foreach ($this->tags as $tag) {
            \App\Models\Tag::findOrCreate([
                'id'   => $tag->id,
                'name' => $tag->name,
                'slug' => $tag->slug,
            ]);
        }
    }
}
