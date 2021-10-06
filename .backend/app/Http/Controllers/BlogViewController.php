<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\DB;


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
        
        // $players = DB::table('players')  // 主となるテーブル名
        //     ->rightJoin('teams as t', 'players.team_id', '=', 't.id')  // teamsをtと省略
        //     ->get();
        // dd($players);

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
