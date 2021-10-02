<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;    

use Tests\TestCase;
use App\Models\User;

class SignUpControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test index
     */
    public function ユーザー登録画面を開ける()
    {
        $this->get('signup')
            ->assertOk();
    }

    /**
     * @test store
     */
    public function ユーザー登録できる()
    {
        $validData = User::factory()->validData();

        $this->post('signup', $validData)
            ->assertRedirect('mypage/blogs');

        unset($validData['password']);

        $this->assertDatabaseHas('users', $validData);

        $user = User::firstWhere($validData);
        $this->assertNotNull($user);


        $this->assertTrue(Hash::check('abcd1234', $user->password));

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test store
     */
    public function 不正なデータではユーザー登録できない()
    {
        $url = 'signup';

        $this->from('signup')->post($url, [])->assertRedirect('signup');

        $this->post($url, ['name' => ''])
            ->assertSessionHasErrors(['name' => '名前は必ず指定してください。']);
        $this->post($url, ['name' => str_repeat('あ', 21)])
            ->assertSessionHasErrors(['name' => '名前は、20文字以下で指定してください。']);
        $this->post($url, ['name' => str_repeat('あ', 20)])
            ->assertSessionDoesntHaveErrors('name');

        $this->post($url, ['email' => ''])
            ->assertSessionHasErrors(['email' => 'メールアドレスは必ず指定してください。']);
        $this->post($url, ['email' => 'aaa@fff@ffd'])
            ->assertSessionHasErrors(['email' => 'メールアドレスには、有効なメールアドレスを指定してください。']);
        
        User::factory()->create(['email' => 'aaa@bbb.net']);
        $this->post($url, ['email' => 'aaa@bbb.net'])
            ->assertSessionHasErrors(['email' => 'メールアドレスの値は既に存在しています。']);

        $this->post($url, ['password' => ''])
            ->assertSessionHasErrors(['password' => 'パスワードは必ず指定してください。']);
        $this->post($url, ['password' => 'test-11'])
            ->assertSessionHasErrors(['password' => 'パスワードは、8文字以上で指定してください。']);
        $this->post($url, ['password' => 'test-111'])
            ->assertSessionDoesntHaveErrors('password');
    }
}
