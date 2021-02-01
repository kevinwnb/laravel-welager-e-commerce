<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //provinces
        DB::table('provinces')->insert([
            'name' => 'Newfoundland',
            'alpha' => 'NL',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Prince Edward Island',
            'alpha' => 'PE',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Nova Scotia',
            'alpha' => 'NS',
        ]);
        DB::table('provinces')->insert([
            'name' => 'New Brunswick',
            'alpha' => 'NB',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Quebec',
            'alpha' => 'QC',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Ontario',
            'alpha' => 'ON',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Manitoba',
            'alpha' => 'MB',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Saskatchewan',
            'alpha' => 'SK',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Alberta',
            'alpha' => 'AB',
        ]);
        DB::table('provinces')->insert([
            'name' => 'British Columbia',
            'alpha' => 'BC',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Yukon',
            'alpha' => 'YT',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Northwest Territories',
            'alpha' => 'NT',
        ]);
        DB::table('provinces')->insert([
            'name' => 'Nunavut',
            'alpha' => 'NU',
        ]);
    }
}
