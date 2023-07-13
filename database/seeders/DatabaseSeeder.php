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
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            RegionSeeder::class,
            DepartmentSeeder::class,
            CategorySeeder::class,
            ShopSeeder::class,
            RecipeSeeder::class,
            ImageSeeder::class,
            ReviewSeeder::class,
            ProductSeeder::class,
            OpeningHourSeeder::class,
        ]);
    }
}
