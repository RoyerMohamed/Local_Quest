<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            ImageSeeder::class,
            RecipeSeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            OpeningHourSeeder::class,
            ProductShopSeeder::class,
            OpeningHourShopSeeder::class,
            FavoriSeeder::class,
        ]);
    }
}
