<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AddressSeeder::class,
            CartSeeder::class,
            CategorySeeder::class,
            ImageSeeder::class,
            ProductDetailSeeder::class,
            ProductPropertySeeder::class,
            ProductSeeder::class,
            ProductSummarySeeder::class,
            ProvinceSeeder::class,
            ReviewSeeder::class,
            UserSeeder::class
        ]);
    }
}
