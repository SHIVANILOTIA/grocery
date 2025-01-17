<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            DB::table('product')->insert([
                'name' => $faker->name(),
                'category' =>'fruits',
                'image' => 'image/1735800277.jpeg',
                'sailing' => $faker->numberBetween(100, 200),
                'discount' => $faker->numberBetween(0, 50),
                'rating' => $faker->numberBetween(1, 5),
                'description' => $faker->sentence(),
                'status' => $faker->numberBetween(0, 2),
            ]);
        }
    }
}
