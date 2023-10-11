<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $postsNews = Post::where('category_id', '=', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $postsNutri = Post::where('category_id', '=', 2)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin.admin', [
            'postsNews' => $postsNews,
            'postsNutri' => $postsNutri
        ]);
    }
}
