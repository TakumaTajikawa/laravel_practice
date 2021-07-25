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
                'name' => '山田太郎',
                'email' => 'taro@yamdada.com',
                'age' => '34',
            ],
            [
                'name' => '大島花子',
                'email' => 'hanako@ohshima.com',
                'age' => '19',
            ],
            [
                'name' => '神崎幸子',
                'email' => 'sachiko@kanzaki.com',
                'age' => '45',
            ],
        ];
        DB::table('peoples')->insert($peoplesParams);
    }
}
