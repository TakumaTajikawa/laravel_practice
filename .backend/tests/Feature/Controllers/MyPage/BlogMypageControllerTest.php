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
        $this->get('mypage/blogs/create')->assertRedirect($url);
        $this->post('mypage/blogs/store', [])->assertRedirect($url); 
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

    /**
     * @test
     * create
     */
    public function マイページの、ブログの新規登録画面を開ける()
    {
        $this->login();
        $this->get('mypage/blogs/create')->assertOk();
    }

    /**
     * @test
     * store
     */
    // public function マイページ、ブログを新規登録できる、公開の場合()
    // {
    //     $this->withoutExceptionHandling();
    //     $this->login();
    //     $validData = Blog::factory()->validData();

    //     $this->post('mypage/blogs/store', $validData)
    //         ->assertRedirect('mypage/blogs/edit/1');

    //     $this->assertDatabaseHas('blogs', $validData);
    // }

    /**
     * @test
     * store
     */
    // public function マイページ、ブログを新規登録できる、非公開の場合()
    // {
    //     $this->login();
    //     $validData = Blog::factory()->validData();

    //     $this->post('mypage/blogs/store', $validData)
    //         ->assertRedirect('mypage/blogs/edit/1');

    //     $validData['status'] = '0';

    //     $this->assertDatabaseHas('blogs', $validData);
    // }
}
