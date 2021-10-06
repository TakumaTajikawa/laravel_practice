<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamsParams = [
            [
                'id' => 1,
                'team_name' => 'ヤクルト'
            ],
            [
                'id' => 2,
                'team_name' => '阪神'
            ],
            [
                'id' => 3,
                'team_name' => '巨人'
            ],
            [
                'id' => 4,
                'team_name' => '中日'
            ],
            [
                'id' => 5,
                'team_name' => '広島'
            ],
            [
                'id' => 6,
                'team_name' => 'DeNA'
            ],
        ];
        DB::table('teams')->insert($teamsParams);
    }
}
