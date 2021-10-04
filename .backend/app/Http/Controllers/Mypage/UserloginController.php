<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserloginController extends Controller
{
    /**
     * ユーザーのログイン画面
     *
     * @return view
     */
    public function index()
    {
        return view('mypage.login');
    }

    /**
     * ユーザーのログイン処理
     *
     * @return view
     */
    public function login(Request $request)
    {
        dd($request);
        $data = $request->validate([
            'email' => ['required', 'email:filter'],
            'password' => ['required'],
        ]);

        if (! auth()->attempt($data)) {
            throw ValidationException::withMessages(['email' => 'メールアドレスかパスワードが間違っています。']);
        }

        return redirect('mypage/blogs');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('mypage/login')
            ->with('status', 'ログアウトしました。');
    }
}