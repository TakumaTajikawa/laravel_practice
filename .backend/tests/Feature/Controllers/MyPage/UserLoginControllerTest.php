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
}
