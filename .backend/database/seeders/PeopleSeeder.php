<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peoplesParams = [
            [
                'name' => 'syohei',
                'email' => 'shohei@yamdada.com',
                'age' => '27',
            ],
            [
                'name' => 'kenta',
                'email' => 'kenta@ohshima.com',
                'age' => '19',
            ],
            [
                'name' => 'yu',
                'email' => 'yu@kanzaki.com',
                'age' => '45',
            ],
            [
                'name' => 'taeko',
                'email' => 'taeko@kanzaki.com',
                'age' => '23',
            ],
            [
                'name' => 'kaede',
                'email' => 'kaede@kanzaki.com',
                'age' => '55',
            ],
            [
                'name' => 'kohei',
                'email' => 'kohei@kanzaki.com',
                'age' => '24',
            ],
            [
                'name' => 'masahiko',
                'email' => 'masahiko@kanzaki.com',
                'age' => '33',
            ],
            [
                'name' => 'keiko',
                'email' => 'keiko@kanzaki.com',
                'age' => '18',
            ],
            [
                'name' => 'yurika',
                'email' => 'yurika@kanzaki.com',
                'age' => '37',
            ],
            [
                'name' => 'kouki',
                'email' => 'kouki@kanzaki.com',
                'age' => '30',
            ],
            [
                'name' => 'arata',
                'email' => 'arata@kanzaki.com',
                'age' => '67',
            ],
            [
                'name' => 'bunta',
                'email' => 'bunta@kanzaki.com',
                'age' => '19',
            ],
            [
                'name' => 'chika',
                'email' => 'chika@kanzaki.com',
                'age' => '27',
            ],
        ];
        DB::table('peoples')->insert($peoplesParams);
    }
}
