<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($p = 1; $p <= 12; $p++) {
            DB::table('product_properties')->insert([
                'title' => trim($faker->sentence($nbWords = 2, $variableNbWords = true), "."),
                'description' => trim($faker->sentence($nbWords = 4, $variableNbWords = true), "."),
                'product_id' => $p
            ]);
            DB::table('product_properties')->insert([
                'title' => trim($faker->sentence($nbWords = 2, $variableNbWords = true), "."),
                'description' => trim($faker->sentence($nbWords = 4, $variableNbWords = true), "."),
                'product_id' => $p
            ]);
            DB::table('product_properties')->insert([
                'title' => trim($faker->sentence($nbWords = 2, $variableNbWords = true), "."),
                'description' => trim($faker->sentence($nbWords = 4, $variableNbWords = true), "."),
                'product_id' => $p
            ]);
            DB::table('product_properties')->insert([
                'title' => trim($faker->sentence($nbWords = 2, $variableNbWords = true), "."),
                'description' => trim($faker->sentence($nbWords = 4, $variableNbWords = true), "."),
                'product_id' => $p
            ]);
        }
    }
}
