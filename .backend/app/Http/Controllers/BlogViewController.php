<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogViewController extends Controller
{
    /**
     * ブログの一覧画面
     *
     * @return void
     */
    public function index()
    {
        // $blogs = Blog::get();

        $blogs = Blog::with('user')
            ->onlyOpen()
            ->withCount('comments')
            ->orderByDesc('comments_count')
            ->get();

        return view('blog.index')->with('blogs', $blogs);
    }
}
