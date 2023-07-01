<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_name' => fake()->imageUrl($width = 640, $height = 480),
            'image_status' => fake()->numberBetween($min = 0, $max = 1),
            'user_id' => fake()->numberBetween($min = 1, $max = 30),  
            'shop_id' => fake()->numberBetween($min = 1, $max = 50),  
            'recipe_id' => fake()->numberBetween($min = 1, $max = 30),  
        ];
    }
}
