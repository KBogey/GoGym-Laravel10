<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4);
        return view('admin.admin', [
            'posts' => $posts
        ]);
    }
}
