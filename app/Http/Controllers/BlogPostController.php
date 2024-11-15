<?php

namespace App\Http\Controllers;

use App\Http\Enums\BlogStatus;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('status', BlogStatus::PUBLISHED)
            ->latest()
            ->paginate(12);

        return view('blog.index', compact('posts'));
    }

    public function view(BlogPost $blogPost)
    {
        return view('blog.view', compact('blogPost'));
    }
}
