<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('category')->orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function create()
    {
        $post = new Post();
        $post->fill([
            'title' => 'Grosse actu !',
            'content' => 'C\'est la grosse actu, le fit, le fun... la vie quoi !'
        ]);
        return view('admin.posts.form', [
            'post' => $post,
            'categories' => Category::select('id','label')->get()
        ]);
    }

    public function store(PostFormRequest $request)
    {
        $post = Post::create($request->validated());
        $post->category()->associate($request->validated('category_id'));
        $post->save();
        return to_route('admin.post.index')->with('success', 'Le post a bien été publié');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', [
            'post' => $post,
            'categories' => Category::select('id','label')->get()
        ]);
    }

    public function update(PostFormRequest $request, Post $post)
    {
        $post->update($request->validated());
        $post->category()->associate($request->validated('category_id'));
        $post->save();
        return to_route('admin.post.index')->with('success', 'Le post a été modifié');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.post.index')->with('success', 'Le post a été supprimé');
    }
}
