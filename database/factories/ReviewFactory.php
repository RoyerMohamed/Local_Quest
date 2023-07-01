<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween($min = 0, $max = 5),
            'message' => fake()->sentence(),  
            'user_id' => fake()->numberBetween($min = 1, $max = 30),  
            'shop_id' => fake()->numberBetween($min = 1, $max = 50),  
            'recipe_id' => fake()->numberBetween($min = 1, $max = 30),  
        
        ];
    }
}
