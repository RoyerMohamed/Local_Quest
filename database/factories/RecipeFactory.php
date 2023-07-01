<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'recipe_title' => fake()->sentence($nbWords = 6),
             'difficulty' => fake()->randomElement($array = array ('easy','meduim','hard')),
             'num_persons' => fake()->numberBetween($min = 1, $max = 12),
             'ingredients' => fake()->sentence(),
             'cooking_time' => fake()->time(),
             'preparation_time' => fake()->time(),
             'recipe_status' => fake()->numberBetween($min = 0, $max = 1),
             'user_id' => fake()->numberBetween($min = 1, $max = 30),  
             'department_id' => fake()->numberBetween($min = 1, $max = 100), 
        ];
    }
}
