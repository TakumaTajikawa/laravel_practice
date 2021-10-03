<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogMypageController extends Controller
{
    /**
     * ブログのマイページ
     *
     * @return view
     */
    public function index()
    {
        $blogs = auth()->user()->blogs;

        return view('mypage.blog.index')->with('blogs', $blogs);
    }
}
