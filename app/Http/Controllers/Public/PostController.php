<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('public.posts.index', [
            'posts' => Post::with('category')->orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function show(string $slug, Post $post)
    {
        $expectedSlug = $post->getSlug();
        if($slug !== $post->getSlug()) {
            return to_route('public.post.show', ['slug' => $expectedSlug, 'post' => $post]);
        }
        return view('public.posts.show', [
            'post' => $post
        ]);
    }
}
