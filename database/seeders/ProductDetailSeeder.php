<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductDetailSeeder extends Seeder
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
            DB::table('product_details')->insert([
                'title' => trim($faker->sentence($nbWords = 3, $variableNbWords = true), "."),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'product_id' => $p
            ]);
            DB::table('product_details')->insert([
                'title' => trim($faker->sentence($nbWords = 3, $variableNbWords = true), "."),
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'product_id' => $p
            ]);
            DB::table('product_details')->insert([
                'title' => trim($faker->sentence($nbWords = 3, $variableNbWords = true), "."),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'product_id' => $p
            ]);
            DB::table('product_details')->insert([
                'title' => trim($faker->sentence($nbWords = 3, $variableNbWords = true), "."),
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'product_id' => $p
            ]);
        }
        // // Earphone
        // DB::table('product_details')->insert([
        //     'title' => 'Best connectivity',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 1
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Long battery life',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 1
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Crystal clear sound',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 1
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Bluetooth 4.1',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 1
        // ]);

        // // Laptop
        // DB::table('product_details')->insert([
        //     'title' => 'Super fast',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 2
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Latest software',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 2
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Office use',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 2
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'High quality',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 2
        // ]);

        // // Smartphone
        // DB::table('product_details')->insert([
        //     'title' => 'Ergonomic',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 3
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Fits in your pocket',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 3
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Gorilla glass',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 3
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Long battery life',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 3
        // ]);

        // // USB flash drive
        // DB::table('product_details')->insert([
        //     'title' => 'Fast data transfer',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 4
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Water resistant',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 4
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Durable',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        //     'product_id' => 4
        // ]);
        // DB::table('product_details')->insert([
        //     'title' => 'Small size',
        //     'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        //     'product_id' => 4
        // ]);
    }
}
