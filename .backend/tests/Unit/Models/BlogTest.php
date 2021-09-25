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
}
