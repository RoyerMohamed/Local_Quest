<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opening_hour>
 */
class Opening_hourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => fake()->randomElement($array = array ('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche')),
            'morning_opening_hour' =>  fake()->time(),
            'morning_closing_hour' =>  fake()->time(),
            'afternoon_opening_hour' =>  fake()->time(),
            'afternoon_closing_hour' =>  fake()->time(),
        ];
    }
}
