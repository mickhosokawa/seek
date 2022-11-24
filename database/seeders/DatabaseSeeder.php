<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\primaryCategory;
use App\Models\SubClassification;
use App\Models\Suburb;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            //jobSeeder::class,
            UserSeeder::class,
            AdminFactorySeeder::class,
            CompanySeeder::class,
            ClassificationSeeder::class,
            StateSeeder::class,
            SuburbSeeder::class,
            SubClassificationSeeder::class,
            JobOfferSeeder::class,
        ]);
    }
}
