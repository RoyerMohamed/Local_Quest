<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'user_name' => 'admin',
            'email' => 'aa@gmail.com',
            'email_verified_at' => now(),
            'password' => 'Password', // password
            'remember_token' => Str::random(10),
            'role_id' => 1
         ]);
         User::factory()->times(29)->create();
    }
}
