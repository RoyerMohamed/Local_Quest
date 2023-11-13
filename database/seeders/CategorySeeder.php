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
            'category_icon' => "epicerie.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "boulangeries",
            'category_icon' => "boutique.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "boucheries-charcuteries",
            'category_icon' => "boucherie.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "marchés de producteurs locaux",
            'category_icon' => "marche.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "fromageries",
            'category_icon' => "fromage.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "poissonneries",
            'category_icon' => "poissonnerie.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "vendeurs de fruits et légumes",
            'category_icon' => "des-legumes.png",
            'category_color' => "#ffffff"
        ]);

        Category::create([
            'category_name' => "fermes",
            'category_icon' => "grange.png",
            'category_color' => "#ffffff"
        ]);
        
        Category::create([
            'category_name' => "pâtisseries",
            'category_icon' => "patisserie.png",
            'category_color' => "#ffffff"
          ]);
        Category::create([
            'category_name' => "produits locaux",
            'category_icon' => "produits_locaux.png",
            'category_color' => "#ffffff"
          ]);
    }
}
