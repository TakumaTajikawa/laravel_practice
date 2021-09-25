<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Blog;
use Tests\TestCase;

class BlogViewControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function ブログのTOPページを開ける()
    {
        $blog1 = Blog::factory()->hasComments(1)->create();
        $blog2 = Blog::factory()->hasComments(3)->create();
        $blog3 = Blog::factory()->hasComments(2)->create();

        $response = $this->get('/');

        $response->assertViewIs('blog.index')
            ->assertOk()
            ->assertSee($blog1->title)
            ->assertSee($blog2->title)
            ->assertSee($blog3->title)
            ->assertSee($blog1->user->name)
            ->assertSee($blog2->user->name)
            ->assertSee($blog3->user->name)
            ->assertSee("(1件のコメント)")
            ->assertSee("(3件のコメント)")
            ->assertSee("(2件のコメント)")
            ->assertSeeInOrder([$blog2->title, $blog3->title, $blog1->title]);
    }

    /**
     * @test
     */
    public function ブログの一覧、非公開のブログは表示されない()
    {
        Blog::factory()->create([
            'status' => Blog::CLOSED,
            'title' => 'ブログA',
        ]);

        Blog::factory()->create(['title' => 'ブログB']);
        Blog::factory()->create(['title' => 'ブログC']);

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertDontSee('ブログA')
            ->assertSee('ブログB')
            ->assertSee('ブログC');


    }
}
