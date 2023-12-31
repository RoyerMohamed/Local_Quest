<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i < 51; $i++) {
            Image::create([
                "image_name" => "default_shop.jpg",
                "image_status" => 1,
                "user_id" => rand(1,50),
                "shop_id" => $i,
                "recipe_id" => $i,
                "is_profil" => rand(0,1),
            ]);
        }
    }
}
