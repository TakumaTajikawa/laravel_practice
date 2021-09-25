<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PeopleSeeder;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(15)->create();
    }
}
