<?php

namespace App\Services\WordPress;

class MergeCommentService
{
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getCommentsContent()
    {
        $content        = file_get_contents($this->path);
        $this->comments = collect(json_decode($content));
    }

    public function handle()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        $this->getCommentsContent();

        $author = \App\Models\User::whereEmail(config('wp2l.default_author_email'))->firstOrFail();

        foreach ($this->comments as $comment) {
            if (\App\Models\Post::whereId($comment->post)->count() > 0) {
                \App\Models\Comment::create([
                    'id'                 => $comment->id,
                    'parent_id'          => (0 == $comment->parent) ? null : $comment->parent,
                    'post_id'            => $comment->post,
                    'user_id'            => $author->id,
                    'author_name'        => $comment->author_name,
                    'author_url'         => $comment->author_url,
                    'author_avatar_urls' => $comment->author_avatar_urls,
                    'content'            => $comment->content->rendered,
                    'is_approved'        => ('approved' == $comment->status) ? true : false,
                    'approved_at'        => ('approved' == $comment->status) ? (\Carbon\Carbon::parse($comment->date)) : null,
                    'created_at'         => \Carbon\Carbon::parse($comment->date),
                    'updated_at'         => \Carbon\Carbon::parse($comment->date),
                ]);
            }
        }

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
