<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OpeningHour; 

class OpeningHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // cree des horaire pour tout les cas de figure : example les marché 
        OpeningHour::create([
            'day' => 'lundi', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => '12:00:00',
            'afternoon_opening_hour' => '14:00:00',
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);
        OpeningHour::create([
            'day' => 'mardi', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => '12:00:00',
            'afternoon_opening_hour' => '14:00:00',
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);
        OpeningHour::create([
            'day' => 'mercredi', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => '12:00:00',
            'afternoon_opening_hour' => '14:00:00',
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);
        OpeningHour::create([
            'day' => 'jeudi', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => '12:00:00',
            'afternoon_opening_hour' => '14:00:00',
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);
        OpeningHour::create([
            'day' => 'vendredi', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => '12:00:00',
            'afternoon_opening_hour' => '14:00:00',
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);
        OpeningHour::create([
            'day' => 'samedi', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => '12:00:00',
            'afternoon_opening_hour' => '14:00:00',
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);
        OpeningHour::create([
            'day' => 'dimanche', 
            'morning_opening_hour' => '09:00:00',
            'morning_closing_hour' => null,
            'afternoon_opening_hour' => null,
            'afternoon_closing_hour' => '17:00:00',
            "user_id" => 1
        ]);

    }
}
