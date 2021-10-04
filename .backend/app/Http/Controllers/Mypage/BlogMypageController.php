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

    /**
     * ブログ作成ページ
     *
     * @return view
     */
    public function create()
    {
        return view('mypage.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->all(['title', 'body']);

        $data['status'] = $request->boolean('status');

        $blog = auth()->user()->blogs->create($data);

        return redirect('mypage/blogs/edit/'.$blog->id);
    }
}
