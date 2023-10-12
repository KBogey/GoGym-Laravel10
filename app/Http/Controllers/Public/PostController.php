<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchPostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(SearchPostsRequest $request)
    {
        $posts = Post::query()->orderBy('created_at', 'desc');
        $search = $request->input('search');

        if( !empty($search)) {
            $postsNews = $posts->where('title', 'like', "%{$search}%")
                                ->orWhere('content', 'like', "%{$search}%");
        }

        return view('public.posts.index', [
           'posts' => $posts->paginate(12)
        ]);
    }

    public function indexnews()
    {
        $postsNews = Post::query()->where('category_id', '=', 1)->orderBy('created_at', 'desc');

        return view('public.posts.index', [
            'posts' => $postsNews->paginate(12)
        ]);
    }

    public function indexnutri()
    {
        $postsNutri = Post::query()->where('category_id', '=', 2)->orderBy('created_at', 'desc');

        return view('public.posts.index', [
           'posts' => $postsNutri->paginate(12)
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
