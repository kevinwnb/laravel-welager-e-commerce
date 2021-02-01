<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('product_summaries')->insert([
                'summary' => 'Lorem ipsum 5%',
                'product_id' => $i
            ]);
            DB::table('product_summaries')->insert([
                'summary' => 'dolor 3 sit amet',
                'product_id' => $i
            ]);
            DB::table('product_summaries')->insert([
                'summary' => 'Amet consectetur adipiscing',
                'product_id' => $i
            ]);
            DB::table('product_summaries')->insert([
                'summary' => '7 sed do eiusmod tempor incididunt',
                'product_id' => $i
            ]);
        }
    }
}
