<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('users.blog', [
            'title' => 'Blog',
            'blogs' => $blog
        ]);
    }

    public function detail($blog_id)
    {
        $blog = Blog::where('id', '=', $blog_id)->first();
        return view('users.blog-detail', [
            'title' => $blog->title,
            'blog' => $blog
        ]);
    }
}
