<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 2; $i++) {
            DB::table('images')->insert([
                'product_id' => 1,
                'path' => 'storage/product images/earphone.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 2,
                'path' => 'storage/product images/laptop.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 3,
                'path' => 'storage/product images/smartphone.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 4,
                'path' => 'storage/product images/thumbdrive.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 5,
                'path' => 'storage/product images/television.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 6,
                'path' => 'storage/product images/laserprinter.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 7,
                'path' => 'storage/product images/wireless speaker.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 8,
                'path' => 'storage/product images/camera.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 9,
                'path' => 'storage/product images/dvdplayer.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 10,
                'path' => 'storage/product images/pc.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 11,
                'path' => 'storage/product images/microsd.jpg'
            ]);
            DB::table('images')->insert([
                'product_id' => 12,
                'path' => 'storage/product images/webcam.jpg'
            ]);
        }
    }
}
