<?php

namespace App\Services\WordPress;

class MergePageService
{
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getPagesContent()
    {
        $content     = file_get_contents($this->path);
        $this->pages = collect(json_decode($content));
    }

    public function handle()
    {
        $this->getPagesContent();

        $author = \App\Models\User::whereEmail(config('wp2l.default_author_email'))->firstOrFail();

        foreach ($this->pages as $page) {
            \App\Models\Page::create([
                'id'               => $page->id,
                'user_id'          => $author->id,
                'slug'             => $page->slug,
                'title'            => $page->title->rendered,
                'content'          => $page->content->rendered,
                'original_content' => $page->content->rendered,
                'excerpt'          => $page->excerpt->rendered,
                'is_published'     => ('publish' == $page->status) ? true : false,
                'published_at'     => ('publish' == $page->status) ? (\Carbon\Carbon::parse($page->date)) : null,
                'created_at'       => \Carbon\Carbon::parse($page->date),
                'updated_at'       => \Carbon\Carbon::parse($page->modified),
            ]);
        }
    }
}
