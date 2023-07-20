<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Password') , // password
            'remember_token' => Str::random(10),
            'role_id' => 1
         ]);
        User::create([
            'user_name' => 'visiteur',
            'email' => 'visiteur@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Password') , // password
            'remember_token' => Str::random(10),
            'role_id' => 2
         ]);
         
         User::factory()->times(29)->create();
    }
}
