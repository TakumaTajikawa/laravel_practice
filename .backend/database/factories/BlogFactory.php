<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'status' => Blog::OPEN,
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(100),
        ];
    }

    public function validData()
    {
        return [
            'user_id' => 4,
            'status' => Blog::OPEN,
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(100),
            'status' => Blog::OPEN,
        ];
    }

    public function seeding()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => $this->faker->biasedNumberBetween(0, 1, ['\Faker\Provider\Biased', 'linearHigh']),
            ];
        });
    }

    public function closed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Blog::CLOSED,
            ];
        });
    }

    public function withCommentsData(array $comments)
    {
        return $this->afterCreating(function (Blog $blog) use ($comments) {
            foreach ($comments as $comment) {
                Comment::factory()->create(array_merge(
                    ['blog_id' => $blog->id], $comment
                ));
            }
        });
    }
}
