<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'name' => 'New South Wales'
            ],
            [
                'name' => 'Queensland'
            ],
            [
                'name' => 'South Australia'
            ],
            [
                'name' => 'Northen Territory'
            ],
            [
                'name' => 'Western Australia'
            ],
            [
                'name' => 'Australian Capital Territory'
            ],
            [
                'name' => 'Tasmania'
            ],
            [
                'name' => 'Victoria'
            ],

        ]);
    }
}
