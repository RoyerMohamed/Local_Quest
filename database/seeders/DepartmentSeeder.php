<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Department::factory()->create([
        'department_name' => "Ain",
        'region_id' => 1
      ]);
      
      Department::factory()->create([
        'department_name' => "Aisne",
        'region_id' => 7
      ]);
      Department::factory()->create([
        'department_name' => "Allier",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Alpes de Haute-Provence",
        'region_id' => 13
      ]);
      Department::factory()->create([
        'department_name' => "Hautes-Alpes",
        'region_id' => 13
      ]);
      Department::factory()->create([
        'department_name' => "Alpes-Maritimes",
        'region_id' => 13
      ]);
      Department::factory()->create([
        'department_name' => "Ardêche",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Ardennes",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Ariège",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Aube",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Aude",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Aveyron",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Bouches-du-Rhône",
        'region_id' => 13
      ]);
      Department::factory()->create([
        'department_name' => "Calvados",
        'region_id' => 9
      ]);
      Department::factory()->create([
        'department_name' => "Cantal",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Charente",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Charente-Maritime",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Cher",
        'region_id' => 4
      ]);
      Department::factory()->create([
        'department_name' => "Corrèze",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Corse-du-Sud",
        'region_id' => 5
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Corse",
        'region_id' => 5
      ]);
      Department::factory()->create([
        'department_name' => "Côte-d'Or",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Côtes d'Armor",
        'region_id' => 3
      ]);
      Department::factory()->create([
        'department_name' => "Creuse",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Dordogne",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Doubs",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Drôme",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Eure",
        'region_id' => 9
      ]);
      Department::factory()->create([
        'department_name' => "Eure-et-Loir",
        'region_id' => 4
      ]);
      Department::factory()->create([
        'department_name' => "Finistère",
        'region_id' => 3
      ]);
      Department::factory()->create([
        'department_name' => "Gard",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Garonne",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Gers",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Gironde",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Hérault",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Île-et-Vilaine",
        'region_id' => 3
      ]);
      Department::factory()->create([
        'department_name' => "Indre",
        'region_id' => 4
      ]);
      Department::factory()->create([
        'department_name' => "Indre-et-Loire",
        'region_id' => 4
      ]);
      Department::factory()->create([
        'department_name' => "Isère",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Jura",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Landes",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Loir-et-Cher",
        'region_id' => 4
      ]);
      Department::factory()->create([
        'department_name' => "Loire",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Loire",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Loire-Atlantique",
        'region_id' => 12
      ]);
      Department::factory()->create([
        'department_name' => "Loiret",
        'region_id' => 4
      ]);
      Department::factory()->create([
        'department_name' => "Lot",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Lot-et-Garonne",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Lozère",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Maine-et-Loire",
        'region_id' => 12
      ]);
      Department::factory()->create([
        'department_name' => "Manche",
        'region_id' => 9
      ]);
      Department::factory()->create([
        'department_name' => "Marne",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Marne",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Mayenne",
        'region_id' => 12
      ]);
      Department::factory()->create([
        'department_name' => "Meurthe-et-Moselle",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Meuse",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Morbihan",
        'region_id' => 3
      ]);
      Department::factory()->create([
        'department_name' => "Moselle",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Nièvre",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Nord",
        'region_id' => 7
      ]);
      Department::factory()->create([
        'department_name' => "Oise",
        'region_id' => 7
      ]);
      Department::factory()->create([
        'department_name' => "Orne",
        'region_id' => 9
      ]);
      Department::factory()->create([
        'department_name' => "Pas-de-Calais",
        'region_id' => 7
      ]);
      Department::factory()->create([
        'department_name' => "Puy-de-Dôme",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Pyrénées-Atlantiques",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Hautes-Pyrénées",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Pyrénées-Orientales",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Bas-Rhin",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Haut-Rhin",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Rhône",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Saône",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Saône-et-Loire",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Sarthe",
        'region_id' => 12
      ]);
      Department::factory()->create([
        'department_name' => "Savoie",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Savoie",
        'region_id' => 1
      ]);
      Department::factory()->create([
        'department_name' => "Paris",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Seine-Maritime",
        'region_id' => 9
      ]);
      Department::factory()->create([
        'department_name' => "Seine-et-Marne",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Yvelines",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Deux-Sèvres",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Tarn",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Tarn-et-Garonne",
        'region_id' => 11
      ]);
      Department::factory()->create([
        'department_name' => "Var",
        'region_id' => 13
      ]);
      Department::factory()->create([
        'department_name' => "Vaucluse",
        'region_id' => 13
      ]);
      Department::factory()->create([
        'department_name' => "Vendée",
        'region_id' => 12
      ]);
      Department::factory()->create([
        'department_name' => "Vienne",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Haute-Vienne",
        'region_id' => 10
      ]);
      Department::factory()->create([
        'department_name' => "Vosges",
        'region_id' => 6
      ]);
      Department::factory()->create([
        'department_name' => "Yonne",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Territoire-de-Belfort",
        'region_id' => 2
      ]);
      Department::factory()->create([
        'department_name' => "Essonne",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Hauts-de-Seine",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Seine-Saint-Denis",
        'region_id' => 8
      ]); 
      Department::factory()->create([
        'department_name' => "Val-de-Marne",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Val-d'Oise",
        'region_id' => 8
      ]);
      Department::factory()->create([
        'department_name' => "Guadeloupe",
        'region_id' => 14
      ]);
      Department::factory()->create([
        'department_name' => "Martinique",
        'region_id' => 15
      ]);
      Department::factory()->create([
        'department_name' => "Guyane",
        'region_id' => 16
      ]);
      Department::factory()->create([
        'department_name' => "La Réunion",
        'region_id' => 17
      ]);
      Department::factory()->create([
        'department_name' => "Mayotte",
        'region_id' => 18
      ]);

    }
}
