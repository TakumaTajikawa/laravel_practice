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
        $this->withoutExceptionHandling();
        $validData = User::factory()->validData();

        $this->post('signup', $validData)
            ->assertOk();

        unset($validData['password']);

        $this->assertDatabaseHas('users', $validData);

        $user = User::firstWhere($validData);
        $this->assertNotNull($user);


        $this->assertTrue(Hash::check('abcd1234', $user->password));
    }

    private function validData($overrides = [])
    {
        return array_merge([
            'name' => '太郎',
            'email' => 'aaa@bbb.net',
            'password' => 'abcdd1234',
        ], $overrides);
    }
}
