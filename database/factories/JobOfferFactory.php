<?php

namespace Database\Factories;

use App\Models\JobOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobOfferFactory extends Factory
{
    protected $model = JobOffer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'job_id'   => function(){ return self::$sequence++; },
            'title' => $this->faker->jobTitle(),
            'company_id' => $this->faker->numberBetween(1,3),
            'suburb_id' => $this->faker->numberBetween(1, 8),
            'sub_classification_id' => $this->faker->numberBetween(1, 8),
            'annual_salary'   => $this->faker->randomNumber(2), 
            'hourly_pay'   => $this->faker->randomNumber(2), 
            'job_type'   => $this->faker->numberBetween(1, 4), 
            'description' => $this->faker->realText(200),
            'is_display' => 1,
        ];
    }
}
