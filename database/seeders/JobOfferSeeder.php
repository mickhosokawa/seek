<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_offers')->insert([
            [
                'company_id' => 1,
                'title' => 'Immediate Start ONLY! No Experience Necessary- $900- $1500 Per Week',
                'suburb_id' => 1,
                'sub_classification_id' => 1,
                'annual_salary' => 60000,
                'hourly_pay' => 50,
                'job_type' => 1,
                'description' => 'Our client is one of the fastest growing Solar renewable energy companies in Australia.  Our business is built around an extremely popular product that has been taken up by over 50000 Australian households.',
                'is_display' => 0,
                'sort_no' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}