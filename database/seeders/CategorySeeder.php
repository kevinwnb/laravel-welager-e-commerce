<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Televisions',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //2
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Smartphones',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //3
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Storage & Memory',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //4
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Laptops & Desktop PCs',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //5
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Printers & Scanners',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //6
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Headphones & Speakers',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //7
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Cameras',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //8
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Accessories',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //9
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'DVD players',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
