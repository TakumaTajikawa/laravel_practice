<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserloginController extends Controller
{
    /**
     * ユーザーのログイン画面
     *
     * @return view
     */
    public function index()
    {
        return view('mypage/login');
    }
}
