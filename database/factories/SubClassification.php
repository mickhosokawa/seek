<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class jobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Job::class;
     private static int $sequence = 1;

    public function definition()
    {
        return [
            'job_id'   => function(){ return self::$sequence++; },
            'position' => $this->faker->jobTitle(),
            'role'     => $this->faker->userName(20),
            'salary'   => $this->faker->randomNumber(2), 
            'location'    => $this->faker->streetAddress(),
            'categories' => $this->faker->catchPhrase(),
            'description' => $this->faker->realText(200)
        ];
    }
}
