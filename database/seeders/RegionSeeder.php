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
        Region::create(['region_name' => "Auvergne-Rhône-Alpes"]);
        Region::create(['region_name' => "Bourgogne-Franche-Comté"]);
        Region::create(['region_name' => "Bretagne"]);
        Region::create(['region_name' => "Centre-Val de Loire"]);
        Region::create(['region_name' => "Corse"]);
        Region::create(['region_name' => "Grand Est"]);
        Region::create(['region_name' => "Hauts-de-France"]);
        Region::create(['region_name' => "Ile-de-France"]);
        Region::create(['region_name' => "Normandie"]);
        Region::create(['region_name' => "Nouvelle-Aquitaine"]);
        Region::create(['region_name' => "Occitanie"]);
        Region::create(['region_name' => "Pays de la Loire"]);
        Region::create(['region_name' => "Provence Alpes Côte d’Azur"]);
        Region::create(['region_name' => "Departements Outre-mer"]);
    }
}
