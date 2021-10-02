<?php

namespace Tests\Feature\Controllers\MyPage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Mypage\UserloginController
 */
class UserLoginControllerTest extends TestCase
{
    /**
     * @test
     * index
     */
    public function ログイン画面を開ける()
    {
        $this->get('mypage/login')->assertOk();
    }

    /**
     * @test
     * 
     */
    public function ログイン時の入力チェック()
    {
        $url = 'mypage/login';

        $this->from($url)->post($url, [])->assertRedirect($url);

        $this->post($url, ['email' => ''])
            ->assertSessionHasErrors(['email' => 'メールアドレスは必ず指定してください。']);
        $this->post($url, ['email' => 'あいうえお@test.net'])
            ->assertSessionHasErrors(['email' => 'メールアドレスには、有効なメールアドレスを指定してください。']);
        $this->post($url, ['email' => 'test@test@test.net'])
            ->assertSessionHasErrors(['email' => 'メールアドレスには、有効なメールアドレスを指定してください。']);
        $this->post($url, ['password' => ''])
            ->assertSessionHasErrors(['password' => 'パスワードは必ず指定してください。']);
    }
}
