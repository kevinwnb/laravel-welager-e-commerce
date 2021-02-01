<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //users
        DB::table('users')->insert([
            'stripe_customer_id' => 'cus_IYk2ecbMeeQhlw',
            'first_name' => 'Kevin',
            'last_name' => 'Wegener',
            'phone' => '0123456789',
            'email' => 'kevinwnb@gmail.com',
            'password' => '$2y$10$bWkMiA6dmlIH1sZuazS4wOIQYVcCXCpQEtW1.qJf2sbR.l0mB8r/G',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        for ($i = 1; $i < 100; $i++) {
            $fn = $faker->firstName($gender = null);
            $ln = $faker->lastName;
            DB::table('users')->insert([
                'first_name' => $fn,
                'last_name' => $ln,
                'phone' => $faker->phoneNumber,
                'email' => $fn . $ln . '@fakemail.com',
                'password' => '$2y$10$bWkMiA6dmlIH1sZuazS4wOIQYVcCXCpQEtW1.qJf2sbR.l0mB8r/G',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
