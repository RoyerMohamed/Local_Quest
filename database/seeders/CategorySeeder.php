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
            'category_color' => "#D58936",
            'default_shop_image' => "epicerie-1.png"
        ]);

        Category::create([
            'category_name' => "Fruits & Légumes",
            'category_icon' => "<i class=\"fa-solid fa-carrot\"></i>",
            'category_color' => "#FCB9B2",
            'default_shop_image' => "fruitslegumes.jpg"
        ]);

        Category::create([
            'category_name' => "Boulangerie",
            'category_icon' => "<i class=\"fa-solid fa-bread-slice\"></i>",
            'category_color' => "#387780",
            'default_shop_image' => "boulangerie.jpg"
        ]);

        Category::create([
            'category_name' => "Pâtisserie",
            'category_icon' => "<i class=\"fa-solid fa-cookie\"></i>",
            'category_color' => "#E83151",
            'default_shop_image' => 'patisserie.jpg'
        ]);

        Category::create([
            'category_name' => "Boucherie & Charcuterie",
            'category_icon' => "<i class=\"fa-solid fa-cow\"></i>",
            'category_color' => "#F3C677",
            'default_shop_image' => "boucherie-1.png"
        ]);

        Category::create([
            'category_name' => "Poissonnerie",
            'category_icon' => "<i class=\"fa-solid fa-fish\"></i>",
            'category_color' => "#746F72",
            'default_shop_image' => "poissonnerie.jpg"
        ]);

        Category::create([
            'category_name' => "Fromagerie",
            'category_icon' => "<i class=\"fa-solid fa-cheese\"></i>",
            'category_color' => "#BAD1CD",
            'default_shop_image' => "fromagerie-1.png"
        ]);

        Category::create([
            'category_name' => "Caviste",
            'category_icon' => "<i class=\"fa-solid fa-wine-bottle\"></i>",
            'category_color' => "#4F5D2F",
            'default_shop_image' => "vin-1.png"
        ]);

        Category::create([
            'category_name' => "Marchés de producteurs",
            'category_icon' => "<i class=\"fa-solid fa-store\"></i>",
            'category_color' => "#CFD6EA",
            'default_shop_image' =>'marchés-de-producteurs.jpg'
        ]);
       
        Category::create([
            'category_name' => "Fermes",
            'category_icon' => "<i class=\"fa-solid fa-tractor\"></i>",
            'category_color' => "#D0CE7C",
            'default_shop_image' => "fermes.jpg"
        ]);
        
        Category::create([
            'category_name' => "Produits locaux",
            'category_icon' => "<i class=\"fa-solid fa-jar\"></i>",
            'category_color' => "#8DAA9D",
            'default_shop_image' =>"produits-locaux.jpg"
          ]);
    }
}
