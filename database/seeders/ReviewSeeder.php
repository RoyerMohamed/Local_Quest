<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 50 ; $i++) { 
            Review::create([
                'shop_id' =>rand(1,50) ,
                'product_id' => rand(1,7)
            ]);
        }
        Review::factory()->times(30)->create();
    }
}
