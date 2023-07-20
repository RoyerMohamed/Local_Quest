<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class FavoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 50 ; $i++) { 
            DB::table("favoris")->insert([
                'shop_id' =>rand(1,Shop::count()) ,
                'user_id' => rand(1, User::count())
            ]);
        }
    }
}
