<?php
    
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\primaryCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class primaryCategoryFactory extends Factory
{
    protected $model = primaryCategory::class;
    private static int $sequence = 1;

    public function definition()
    {
        return 
        [
            'name' => $this->faker->city(),
            'sort_order' => function(){ return self::$sequence++; }
        ];
    }
}