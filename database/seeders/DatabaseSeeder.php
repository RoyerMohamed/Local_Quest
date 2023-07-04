<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Shop;
use App\Models\Image;
use App\Models\Opening_hour;
use App\Models\Recipe;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create(['role_name' => "admin"]);
        Shop::factory()->times(50)->create();
        Image::factory()->times(50)->create();
        Recipe::factory()->times(30)->create();
        Review::factory()->times(100)->create();
        Opening_hour::factory()->times(10)->create();
        
        $this->call(RegionSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
         
    }
}
