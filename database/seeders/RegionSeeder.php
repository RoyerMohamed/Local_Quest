<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::factory()->create(['region_name' => "Auvergne-Rhône-Alpes"]);
        Region::factory()->create(['region_name' => "Bourgogne-Franche-Comté"]);
        Region::factory()->create(['region_name' => "Bretagne"]);
        Region::factory()->create(['region_name' => "Centre-Val de Loire"]);
        Region::factory()->create(['region_name' => "Corse"]);
        Region::factory()->create(['region_name' => "Grand Est"]);
        Region::factory()->create(['region_name' => "Hauts-de-France"]);
        Region::factory()->create(['region_name' => "Ile-de-France"]);
        Region::factory()->create(['region_name' => "Normandie"]);
        Region::factory()->create(['region_name' => "Nouvelle-Aquitaine"]);
        Region::factory()->create(['region_name' => "Occitanie"]);
        Region::factory()->create(['region_name' => "Pays de la Loire"]);
        Region::factory()->create(['region_name' => "Provence Alpes Côte d’Azur"]);
        Region::factory()->create(['region_name' => "Guadeloupe"]);
        Region::factory()->create(['region_name' => "Guyane"]);
        Region::factory()->create(['region_name' => "Martinique"]);
        Region::factory()->create(['region_name' => "Mayotte"]);
        Region::factory()->create(['region_name' => "Réunion"]);
    }
}
