<?php

namespace Database\Seeders\Company;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = Admin::class;

    public function run()
    {
        DB::table('awards_and_accreditations')->insert([
            [
                'company_id' => 4,
                'title' => 'LinkedIn Top companies 2022',
                'image' => 'https://www.seek.com.au/companies/westpac-group-753081?cid=sk-home-carousel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'company_id' => 4,
                'title' => 'Ranked #4 AFR Top 100 Graduate Employers 2022',
                'image' => 'https://www.seek.com.au/companies/westpac-group-753081?cid=sk-home-carousel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'company_id' => 4,
                'title' => 'AAGEs'.' Top Graduate Employers List 2022',
                'image' => 'https://www.seek.com.au/companies/westpac-group-753081?cid=sk-home-carousel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'company_id' => 4,
                'title' => 'Ranked #4 Prosple Top 100 Graduate Employers 2022',
                'image' => 'https://www.seek.com.au/companies/westpac-group-753081?cid=sk-home-carousel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'company_id' => 4,
                'title' => 'Bronze employer status in the Australian Workplace Equality Index (AWEI) 2022',
                'image' => 'https://www.seek.com.au/companies/westpac-group-753081?cid=sk-home-carousel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'company_id' => 4,
                'title' => 'Universum Most Attractive Employers 2021',
                'image' => 'https://www.seek.com.au/companies/westpac-group-753081?cid=sk-home-carousel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
