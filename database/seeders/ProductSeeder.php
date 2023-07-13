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
        Product::create([
            'product_name' => "fruit",
            'product_icon' => "fruit.png",
            'product_color' => "#ffffff"
        ]);
        Product::create([
            'product_name' => "légume",
            'product_icon' => "legume.png",
            'product_color' => "#ffffff"
        ]);
        Product::create([
            'product_name' => "produit laitier",
            'product_icon' => "produit_laitier.png",
            'product_color' => "#ffffff"
        ]);
        Product::create([
            'product_name' => "alcool",
            'product_icon' => "alcool.png",
            'product_color' => "#ffffff"
        ]);
        Product::create([
            'product_name' => "viande_rouge",
            'product_icon' => "viande_rouge.png",
            'product_color' => "#ffffff"
        ]);
        Product::create([
            'product_name' => "viande_blanch",
            'product_icon' => "viande_blanch.png",
            'product_color' => "#ffffff"
        ]);
        Product::create([
            'product_name' => "poisson",
            'product_icon' => "poisson.png",
            'product_color' => "#ffffff"
        ]);
    }
}
