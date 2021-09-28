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
            ->assertOk();

        unset($validData['password']);

        $this->assertDatabaseHas('users', $validData);

        $user = User::firstWhere($validData);
        $this->assertNotNull($user);


        $this->assertTrue(Hash::check('abcd1234', $user->password));
    }

    /**
     * @test store
     */
    public function 不正なデータではユーザー登録できない()
    {
        // $this->withoutExceptionHandling();
        $url = 'signup';

        $this->post($url, ['name' => ''])
            ->assertSessionHasErrors('name');
        $this->post($url, ['name' => str_repeat('あ', 21)])
            ->assertSessionHasErrors('name');
        $this->post($url, ['name' => str_repeat('あ', 20)])
            ->assertSessionDoesntHaveErrors('name');
    }
}
