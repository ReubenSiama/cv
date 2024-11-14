<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get();

        return view('blog.index', compact('posts'));
    }

    public function view(BlogPost $blogPost)
    {
        return view('blog.view', compact('blogPost'));
    }
}
