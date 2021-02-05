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
            'name' => 'Bluetooth 5.0 earphone',
            'description' => 'An earphone for handless communication',
            'price' => 74.99,
            'keywords' => 'earphone, earbud',
            'category_id' => 6,
            'stripe_price_id' => 'price_1I7tRfKlmt80RKMYzvMrcBMX',
        ]);
        DB::table('products')->insert([
            'name' => 'Laptop 15" 4ghz 8gb',
            'description' => 'A laptop for home and entertainment',
            'price' => 359.99,
            'keywords' => 'laptop',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Smartphone 5" 16gb',
            'description' => 'A smartphone for seamless multitask',
            'price' => 48.99,
            'keywords' => 'smartphone, phone',
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'name' => 'Thumbdrive USB 3.0',
            'description' => 'A thumbdrive for limitless data transportation',
            'price' => 4.99,
            'keywords' => 'thumbdrive, flashdrive',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => '4K 65" smart TV',
            'description' => 'A 4K television for best entertainment',
            'price' => 689.99,
            'keywords' => 'television, tv, smart tv',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Laser printer D320',
            'description' => 'A pair of shoes',
            'price' => 79.99,
            'keywords' => 'shoes, a',
            'category_id' => 5,
        ]);
        DB::table('products')->insert([
            'name' => 'Wireless bluetooth 5.0 speaker',
            'description' => 'A wireless speaker',
            'price' => 59.99,
            'keywords' => 'speaker, wireless speaker, portable speaker, bluetooth speaker',
            'category_id' => 6,
        ]);
        DB::table('products')->insert([
            'name' => 'Camera 20.9 MP',
            'description' => 'Take quality pictures with this camera',
            'price' => 9.99,
            'keywords' => 'camera, photo camera, photo',
            'category_id' => 7,
        ]);

        DB::table('products')->insert([
            'name' => 'DVD player + remote',
            'description' => 'Watch your favorite movies and series with this DVD player',
            'price' => 85.71,
            'keywords' => 'camera, photo camera, photo',
            'category_id' => 9,
        ]);
        DB::table('products')->insert([
            'name' => 'Desktop PC 16gb 4ghz',
            'description' => 'Computer',
            'price' => 460.71,
            'keywords' => 'pc, computer, desktop, desktop pc',
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'name' => 'Micro sd card 8gb',
            'description' => 'Micro sd',
            'price' => 12.49,
            'keywords' => 'sd card, micro sd, sd',
            'category_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Webcam 1080/30fps mic',
            'description' => 'Webcam',
            'price' => 105.12,
            'keywords' => 'webcam, camera, cam',
            'category_id' => 8,
        ]);
    }
}
