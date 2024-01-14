<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        Category::create([
            'category_name' => "Épicerie",
            'category_icon' => "<i class=\"fa-solid fa-shop\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Fruits & Légumes",
            'category_icon' => "<i class=\"fa-solid fa-carrot\"></i>",
            'category_color' => "#ffffff"
        ]);


        Category::create([
            'category_name' => "Boulangerie",
            'category_icon' => "<i class=\"fa-solid fa-bread-slice\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Pâtisserie",
            'category_icon' => "<i class=\"fa-solid fa-cookie\"></i>",
            'category_color' => "#ffffff"
          ]);

        Category::create([
            'category_name' => "Boucherie & Charcuterie",
            'category_icon' => "<i class=\"fa-solid fa-cow\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Poissonnerie",
            'category_icon' => "<i class=\"fa-solid fa-fish\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Fromagerie",
            'category_icon' => "<i class=\"fa-solid fa-cheese\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Caviste",
            'category_icon' => "<i class=\"fa-solid fa-wine-bottle\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Marchés de producteurs",
            'category_icon' => "<i class=\"fa-solid fa-store\"></i>",
            'category_color' => "#ffffff"
        ]);

       
        Category::create([
            'category_name' => "Fermes",
            'category_icon' => "<i class=\"fa-solid fa-tractor\"></i>",
            'category_color' => "#ffffff"
        ]);
        
        
        Category::create([
            'category_name' => "Produits locaux",
            'category_icon' => "<i class=\"fa-solid fa-jar\"></i>",
            'category_color' => "#ffffff"
          ]);
    }
}
