<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //products
        DB::table('products')->insert([
            'name' => 'Earphone',
            'description' => 'An earphone for handless communication',
            'price' => 74.99,
            'keywords' => 'earphone, earbud',
            'category_id' => 6,
            'stripe_price_id' => 'price_1I7tRfKlmt80RKMYzvMrcBMX',
        ]);
        DB::table('products')->insert([
            'name' => 'Laptop',
            'description' => 'A laptop for home and entertainment',
            'price' => 359.99,
            'keywords' => 'laptop',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Smartphone',
            'description' => 'A smartphone for seamless multitask',
            'price' => 48.99,
            'keywords' => 'smartphone, phone',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Thumbdrive',
            'description' => 'A thumbdrive for limitless data transportation',
            'price' => 4.99,
            'keywords' => 'thumbdrive, flashdrive',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Jacket',
            'description' => 'A jacket for a coldless winter',
            'price' => 89.99,
            'keywords' => 'jacket, winter jacket',
            'category_id' => 10,
        ]);
        DB::table('products')->insert([
            'name' => 'Shoes',
            'description' => 'A pair of shoes',
            'price' => 59.99,
            'keywords' => 'shoes, a',
            'category_id' => 11,
        ]);
        DB::table('products')->insert([
            'name' => 'Socks',
            'description' => 'A pair of socks',
            'price' => 9.99,
            'keywords' => 'socks, a',
            'category_id' => 7,
        ]);
        DB::table('products')->insert([
            'name' => 'T-Shirt',
            'description' => 'A T-Shirt',
            'price' => 7.99,
            'keywords' => 'tshirt, T-Shirt, T-shirt',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'name' => 'Pants',
            'description' => 'Some Pants',
            'price' => 7.99,
            'keywords' => 'pants jeans',
            'category_id' => 8,
        ]);
    }
}
