<?php

namespace Tests\Feature\Controllers\Mypage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\Mypage\BlogMypageController;
use Tests\TestCase;
use App\Models\User;
use App\Models\Blog;

/**
 * @see BlogMypageController
 */
class BlogMypageControllerTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @test
     */
    public function ゲストはブログを管理できない()
    {
        $url = 'mypage/login';

        $this->get('mypage/blogs')->assertRedirect($url);
    }

    /**
     * @test
     * index
     */
    public function マイページ、ブログ一覧で自分のデータのみ表示される()
    {
        $user = $this->login();

        $other = Blog::factory()->create();
        $myblog = Blog::factory()->create(['user_id' => $user]);

        $this->get('mypage/blogs')
            ->assertOk()
            ->assertDontSee($other->title)
            ->assertSee($myblog->title);
    }
}
