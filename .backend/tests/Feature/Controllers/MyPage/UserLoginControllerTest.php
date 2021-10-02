<?php

namespace Tests\Feature\Controllers\MyPage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Mypage\UserloginController
 */
class UserLoginControllerTest extends TestCase
{
    use RefreshDatabase;
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
     * login
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

    /**
     * @test
     * login
     */
    public function ログインできる()
    {
        $this->withoutExceptionHandling();
        $url = 'mypage/login';

        $postData = [
            'email' => 'abcdef@bbb.net',
            'password' => 'Test-12345'
        ];

        $dbData = [
            'email' => 'abcdef@bbb.net',
            'password' => bcrypt('Test-12345')
        ];

        $postDataString = json_encode($postData);

        $user = User::factory()->create($dbData);

        $this->post($url, $postData)
            ->assertRedirect('mypage/blogs');

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     * login
     */
    public function メールアドレスを間違えているのでログインできない()
    {
        $url = 'mypage/login';

        $postData = [
            'email' => 'aaaaaa@bbb.net',
            'password' => 'Test-12345'
        ];

        $dbData = [
            'email' => 'aaaddaaaaa@bbb.net',
            'password' => bcrypt('Test-12345')
        ];

        $user = User::factory()->create($dbData);

        $this->from($url)->post($url, $postData)
            ->assertRedirect($url);

        $this->from($url)->followingRedirects()->post($url, $postData)
            ->assertSee('メールアドレスかパスワードが間違っています。')
            ->assertSee('<h1>ログイン画面</h1>', false);
    }

    /**
     * @test
     * login
     */
    public function パスワードを間違えているのでログインできない()
    {
        $url = 'mypage/login';

        $postData = [
            'email' => 'aaa@bbb.net',
            'password' => 'Test-12345'
        ];

        $dbData = [
            'email' => 'aaa@bbb.net',
            'password' => bcrypt('Test-123456789')
        ];

        $user = User::factory()->create($dbData);

        $this->from($url)->post($url, $postData)
            ->assertRedirect($url);

        $this->from($url)->followingRedirects()->post($url, $postData)
            ->assertSee('メールアドレスかパスワードが間違っています。')
            ->assertSee('<h1>ログイン画面</h1>', false);
    }
}
