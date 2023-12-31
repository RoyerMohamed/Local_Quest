<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe; 
class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // real recipe 
        Recipe::create([
            'recipe_title' => fake()->sentence($nbWords = 6),
             'difficulty' => fake()->randomElement($array = array ('facile','moyen','difficile')),
             'num_persons' => fake()->numberBetween($min = 1, $max = 12),
             'ingredients' => fake()->sentence(),
             'cooking_time' => rand(10,50),
             'preparation_time' => rand(10,50),
             'recipe_status' => fake()->numberBetween($min = 0, $max = 1),
             'user_id' => fake()->numberBetween($min = 1, $max = 30),  
             'department_id' => fake()->numberBetween($min = 1, $max = 102), 
        ]);

        Recipe::factory()->times(50)->create();
    }
}
