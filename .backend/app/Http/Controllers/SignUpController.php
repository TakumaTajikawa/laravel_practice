<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    /**
     * ユーザー登録画面
     *
     * @return void
     */
    public function index()
    {
        return view('signup');
    }

    /**
     * ユーザー登録処理
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:20'],
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }
}
