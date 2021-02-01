<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Earphone
        DB::table('product_properties')->insert([
            'title' => 'Color',
            'description' => 'Black',
            'product_id' => 1
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Batteries',
            'description' => '1 Lithium Polymer battery required. (included)',
            'product_id' => 1
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Dimensions',
            'description' => '7.5cm x 4cm x 2cm',
            'product_id' => 1
        ]);

        // Laptop
        DB::table('product_properties')->insert([
            'title' => 'Color',
            'description' => 'Spacegray',
            'product_id' => 2
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Processor Speed',
            'description' => '4.5 ghz',
            'product_id' => 2
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Dimensions',
            'description' => '40cm x 32cm x 1cm',
            'product_id' => 2
        ]);

        // Smartphone
        DB::table('product_properties')->insert([
            'title' => 'Color',
            'description' => 'Black',
            'product_id' => 3
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Processor Speed',
            'description' => '2.5 ghz',
            'product_id' => 3
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Dimensions',
            'description' => '13cm x 5cm x 0.4cm',
            'product_id' => 3
        ]);

        // USB flash drive
        DB::table('product_properties')->insert([
            'title' => 'Color',
            'description' => 'Black',
            'product_id' => 3
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Memory',
            'description' => '128gb',
            'product_id' => 3
        ]);
        DB::table('product_properties')->insert([
            'title' => 'Dimensions',
            'description' => '3cm x 1cm x 0.3cm',
            'product_id' => 3
        ]);
    }
}
