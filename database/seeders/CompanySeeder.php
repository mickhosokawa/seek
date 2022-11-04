<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Banapan1',
                'email' => 'banapan1@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
    
            ],
            [
                'name' => 'Banapan2',
                'email' => 'banapan2@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
    
            ],
            [
                'name' => 'Banapan3',
                'email' => 'banapan3@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
    
            ],
        ]);
    }
}
