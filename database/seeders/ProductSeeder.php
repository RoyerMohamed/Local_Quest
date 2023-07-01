<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'product_name' => "carotte",
            'product_icon' => "carotte.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "tomate",
            'product_icon' => "tomate.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "Pomme de terre",
            'product_icon' => "pommes-de-terre.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "courgette",
            'product_icon' => "courgette.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "haricots-verts",
            'product_icon' => "haricots-verts.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "poireau",
            'product_icon' => "poireau.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "aubergine",
            'product_icon' => "aubergine.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "poivron",
            'product_icon' => "poivron.png",
            'product_color' => "#ffffff"
        ]);
        Product::factory()->create([
            'product_name' => "radis",
            'product_icon' => "un-radis.png",
            'product_color' => "#ffffff"
        ]);
    }
}
