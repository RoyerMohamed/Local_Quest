<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_title' => fake()->company() , 
            'description' => fake()->paragraph($nbSentences = 100, $variableNbSentences = true), 
            'website' => "https://www." . fake()->domainName(), 
            'adresse' => fake()->streetAddress(), 
            'phone_number' => fake()->phoneNumber(),
            'zip_code' => fake()->numberBetween($min = 01000, $max = 97600), 
            'city' => fake()->city(), 
            'rating' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5), 
            'nb_rating' => rand(0,100),
            'latitude' => rand(44, 49),
            'longitude' => rand(-1, 6.9),
            'shop_status' => fake()->numberBetween($min = 0, $max = 1),  
            'user_id' => fake()->numberBetween($min = 1, $max = 30),  
            'department_id' => fake()->numberBetween($min = 1, $max = 100),  
            'category_id' => fake()->numberBetween($min = 1, $max = 11 )  
        ];
    }
}
