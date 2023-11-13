<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class OpeningHourShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("opening_hours_shops")->insert([
                'shop_id' => $i,
                'opening_hour_id' => 1
            ]);
        }
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("opening_hours_shops")->insert([
                'shop_id' => $i,
                'opening_hour_id' => 2
            ]);
        }
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("opening_hours_shops")->insert([
                'shop_id' => $i,
                'opening_hour_id' => 3
            ]);
        }
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("opening_hours_shops")->insert([
                'shop_id' => $i,
                'opening_hour_id' => 4
            ]);
        }
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("opening_hours_shops")->insert([
                'shop_id' => $i,
                'opening_hour_id' => 5
            ]);
        }
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("opening_hours_shops")->insert([
                'shop_id' => $i,
                'opening_hour_id' => 6
            ]);
        }
        for ($i=1; $i < 50 ; $i++) { 
            if($i === 3){
                DB::table("opening_hours_shops")->insert([
                    'shop_id' => $i,
                    'opening_hour_id' => 7
                ]);
            }else{
                DB::table("opening_hours_shops")->insert([
                    'shop_id' => $i,
                    'opening_hour_id' => 5
                ]);
            }
        }
    }
}
