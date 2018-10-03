<?php 

namespace App\Services\WordPress;

class MergePostService
{
	public function __construct($path)
	{
		$this->path = $path;
	}

	public function getPostsContent()
	{
		$content = file_get_contents($this->path);
		$this->posts = collect(json_decode($content));
	}

	public function handle()
	{
		$this->getPostsContent();

		$author = \App\Models\User::whereEmail(config('wp2l.default_author_email'))->firstOrFail();

		foreach ($this->posts as $post) {
			\App\Models\Post::create([
				'user_id' => $author->id,
				'slug' => $post->slug,
				'title' => $post->title->rendered,
				'content' => $post->content->rendered,
				'original_content' => $post->content->rendered,
				'excerpt' => $post->excerpt->rendered,
				'is_published' => ('publish' == $post->status) ? true : false,
				'published_at' => ('publish' == $post->status) ? (\Carbon\Carbon::parse($post->date)) : null,
			])->attachTags($this->getTags($post->tags));
		}
	}

	private function getTags($tag_ids)
	{
		return \App\Models\Tag::whereIn('id', $tag_ids)->get()->map(function($tag){
			return $tag->getTranslation('name', 'en');
		});
	}
	
}