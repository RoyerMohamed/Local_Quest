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
            'category_name' => "Épiceries",
            'category_icon' => "<i class=\"fa-solid fa-shop\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Boulangeries",
            'category_icon' => "<i class=\"fa-solid fa-bread-slice\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Boucheries & Charcuteries",
            'category_icon' => "<i class=\"fa-solid fa-drumstick-bite\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Marchés de producteurs locaux",
            'category_icon' => "<i class=\"fa-solid fa-carrot\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Fromageries",
            'category_icon' => "<i class=\"fa-solid fa-cheese\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Poissonneries",
            'category_icon' => "<i class=\"fa-solid fa-fish\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Vendeurs de fruits et légumes",
            'category_icon' => "<i class=\"fa-solid fa-seedling\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "Fermes",
            'category_icon' => "<i class=\"fa-solid fa-tractor\"></i>",
            'category_color' => "#ffffff"
        ]);
        
        Category::create([
            'category_name' => "Pâtisseries",
            'category_icon' => "<i class=\"fa-solid fa-cake-candles\"></i>",
            'category_color' => "#ffffff"
          ]);
        Category::create([
            'category_name' => "Produits locaux",
            'category_icon' => "<i class=\"fa-solid fa-leaf\"></i>",
            'category_color' => "#ffffff"
          ]);
    }
}
