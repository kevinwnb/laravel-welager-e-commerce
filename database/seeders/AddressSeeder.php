<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //addresses
        DB::table('addresses')->insert([
            'user_id' => 1,
            'phone' => '705-312-0694',
            'city' => 'Peterborough',
            'province_id' => 6,
            'address' => '2319 George Street',
            'postal_code' => 'K9H 2L1',
            'default' => 1,
        ]);
    }
}
