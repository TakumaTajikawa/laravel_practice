<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

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
        $data = $request->validate([
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email:filter', Rule::unique('users')],
            'password' => ['required', 'min:8'],
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
