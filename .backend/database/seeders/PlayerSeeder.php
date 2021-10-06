<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playersParams = [
            [
                'id' => 1,
                'name' => '吉田',
                'team_id' => 7,
            ],
            [
                'id' => 2,
                'name' => '村上',
                'team_id' => 1,
            ],
            [
                'id' => 3,
                'name' => '坂本',
                'team_id' => 3,
            ],
            [
                'id' => 4,
                'name' => '柳田',
                'team_id' => 11,
            ],
            [
                'id' => 5,
                'name' => '大野',
                'team_id' => 4,
            ],
            [
                'id' => 6,
                'name' => '山崎',
                'team_id' => 6,
            ],
        ];
        DB::table('players')->insert($playersParams);
    }
}
