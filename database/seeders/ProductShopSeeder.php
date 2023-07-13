<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProductShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("products_shops")->insert([
                'shop_id' =>rand(1,50) ,
                'product_id' => rand(1,7)
            ]);
        }
    }
}
