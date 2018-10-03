<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $posts = \App\Models\Post::withDetails()->latest()->paginate();
        return view('welcome', compact('posts'));
    }
}
