<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuburbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suburbs')->insert([
            [
                'name' => 'Sydney',
                'state_id' => 1,
                'post_code' => 2000,
            ],
            [
                'name' => 'Brisbane',
                'state_id' => 2,
                'post_code' => 4000,
            ],
            [
                'name' => 'Adelaide',
                'state_id' => 3,
                'post_code' => 5000,
            ],
            [
                'name' => 'Darwin',
                'state_id' => 4,
                'post_code' => "0810",
            ],
            [
                'name' => 'Perth',
                'state_id' => 5,
                'post_code' => 6000,
            ],
            [
                'name' => 'Canberra',
                'state_id' => 6,
                'post_code' => 2601,
            ],
            [
                'name' => 'Hobart',
                'state_id' => 7,
                'post_code' => 7000,
            ],
            [
                'name' => 'Melbourne',
                'state_id' => 8,
                'post_code' => 3000,
            ],
        ]);
    }
}
