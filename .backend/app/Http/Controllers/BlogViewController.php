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

    /**
     * ブログの詳細画面を表示
     *
     * @param Blog $blog
     * @return void
     */
    public function show(Blog $blog)
    {
        if ($blog->isClosed()) {
            abort(403);
        }

        return view('blog.show')->with('blog', $blog);
    }
}
