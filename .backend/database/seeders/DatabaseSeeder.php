<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PeopleSeeder;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Blog::factory(15)->create();
        User::factory(15)->create()->each(function ($user) {
            Blog::factory(random_int(2, 5))->seeding()->create(['user_id' => $user])->each(function ($blog) {
                Comment::factory(random_int(1, 3))->create(['blog_id' => $blog]);
            });
        });

        User::first()->update([
            'name' => 'オレ',
            'email' => 'oreore@example.com',
            'password' => bcrypt('hogehoge'),
        ]);
    }
}
