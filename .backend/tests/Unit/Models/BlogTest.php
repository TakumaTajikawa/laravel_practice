<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Blogモデルとのリレーションを返す
     *
     * @return void
     */
    public function user_relation()
    {
        $blog = Blog::factory()->create();


        $this->assertInstanceOf(User::class, $blog->user);
    }

    /**
     * @test
     * Commentモデルとのリレーションを返す
     *
     * @return void
     */
    public function comment_relation()
    {
        $blog = Blog::factory()->create();

        $this->assertInstanceOf(Collection::class, $blog->comments);
    }

    /**
     * @test
     * scopeOnlyOpen
     */
    public function ブログの公開・非公開のscope()
    {
        $blog1 = Blog::factory()->create([
            'status' => Blog::CLOSED,
            'title' => 'ブログA',
        ]);

        $blog2 = Blog::factory()->create(['title' => 'ブログB']);
        $blog3 = Blog::factory()->create(['title' => 'ブログC']);

        $blogs = Blog::onlyOpen()->get();

        $this->assertFalse($blogs->contains($blog1));
        $this->assertTrue($blogs->contains($blog2));
        $this->assertTrue($blogs->contains($blog3));
    }

    /**
     * @test
     * 
     * isClosed()
     */
    public function ブログで非公開はtrueを返し、公開時はfalseを返す()
    {
        $blog = Blog::factory()->make();

        $this->assertFalse($blog->isClosed());

        $blog = Blog::factory()->closed()->make();

        $this->assertTrue($blog->isClosed());
    }
}
