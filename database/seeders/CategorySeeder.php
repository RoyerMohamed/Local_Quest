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
            'category_name' => "épiceries",
            'category_icon' => "<i class=\"fa-solid fa-shop\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "boulangeries",
            'category_icon' => "<i class=\"fa-solid fa-bread-slice\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "boucheries-charcuteries",
            'category_icon' => "<i class=\"fa-solid fa-drumstick-bite\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "marchés de producteurs locaux",
            'category_icon' => "<i class=\"fa-solid fa-carrot\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "fromageries",
            'category_icon' => "<i class=\"fa-solid fa-cheese\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "poissonneries",
            'category_icon' => "<i class=\"fa-solid fa-fish\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "vendeurs de fruits et légumes",
            'category_icon' => "<i class=\"fa-solid fa-seedling\"></i>",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "fermes",
            'category_icon' => "<i class=\"fa-solid fa-tractor\"></i>",
            'category_color' => "#ffffff"
        ]);
        
        Category::create([
            'category_name' => "pâtisseries",
            'category_icon' => "<i class=\"fa-solid fa-cake-candles\"></i>",
            'category_color' => "#ffffff"
          ]);
        Category::create([
            'category_name' => "produits locaux",
            'category_icon' => "<i class=\"fa-solid fa-leaf\"></i>",
            'category_color' => "#ffffff"
          ]);
    }
}
