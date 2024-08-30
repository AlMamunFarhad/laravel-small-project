<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\CustomModel;
// use Faker\Factory;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CustomModel::factory(10)->create();

      // User::factory()->has(CustomModel::factory()->count(20))->create();
       // User::factory()->has(Post::factory()->count(10))->create();

      User::factory()->has(CustomModel::factory()->count(20))->create();
    }
}
