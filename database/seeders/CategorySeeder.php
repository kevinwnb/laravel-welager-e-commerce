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
        //categories
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Clothing',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => null,
            'name' => 'Electronics',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => 'Storage & Memory',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => 'Laptops & Desktop PC\'s',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => 'Smartphones',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 2,
            'name' => 'Headphones & Speakers',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => 'Socks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => 'Pants',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => 'T-Shirts',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => 'Jackets',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'parent_id' => 1,
            'name' => 'Shoes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
