<?php

namespace App\Services\WordPress;

class MergeMediumService
{
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getMediaContent()
    {
        $content     = file_get_contents($this->path);
        $this->media = collect(json_decode($content));
    }

    public function handle()
    {
        $this->getMediaContent();
       
        foreach ($this->media as $medium) {
            \App\Models\File::create([
                'name' => basename($medium->source_url),
            ])
            ->addMediaFromUrl($medium->source_url)
            ->withCustomProperties([
                'id'          => $medium->id,
                'source_url'  => $medium->source_url,
                'description' => $medium->description->rendered,
                'caption'     => $medium->caption->rendered,
            ])
            ->toMediaCollection();
        }
    }
}
