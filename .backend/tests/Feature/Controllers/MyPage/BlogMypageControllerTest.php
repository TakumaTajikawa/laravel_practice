<?php

namespace Tests\Feature\Controllers\Mypage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\Mypage\BlogMypageController;
use Tests\TestCase;
use App\Models\User;

/**
 * @see BlogMypageController
 */
class BlogMypageControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * index
     */
    public function 認証している場合に限り、マイページを開ける()
    {
        // 認証していない場合
        $this->get('mypage/blogs')
            ->assertRedirect('mypage/login');

        //認証している場合
        $this->login();

        $this->get('mypage/blogs')
            ->assertOk();
    }
}
