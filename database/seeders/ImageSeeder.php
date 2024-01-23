<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Shop;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shops = Shop::all(); 

        foreach($shops as $shop){

            Image::create([
                "image_name" => $shop->category->default_shop_image,
                "image_status" => 1,
                "user_id" => rand(1,50),
                "shop_id" => $shop->id,
                "recipe_id" => null,
                "is_profil" => rand(0,1),
            ]);
        }

        
    }
}
