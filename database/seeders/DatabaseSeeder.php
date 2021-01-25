<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetail;
use App\Models\ProductDetails;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //reviews
        for ($n = 1; $n < 420; $n++) {
            $stars = null;
            if ($n <= 40) {
                $stars = 1;
            }
            if ($n > 40 && $n <= 60) {
                $stars = mt_rand(2, 3);
            }
            if ($n > 60 && $n <= 100) {
                $stars = 4;
            }
            if ($n > 100 && $n <= 400) {
                $stars = 5;
            }
            if ($n > 400) {
                $stars = mt_rand(1, 5);
            }
            DB::table('reviews')->insert([
                'product_id' => 1,
                'user_id' => 1,
                'title' => ($stars < 3 ? 'Bad product' : '') . ($stars == 3 ? 'Acceptable product' : '') . ($stars > 3 ? 'Great product' : ''),
                'review' => file_get_contents('http://loripsum.net/api/1/plaintext'),
                'stars' => $stars,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        //carts
        DB::table('carts')->insert([
            'user_id' => 1
        ]);

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

        //addresses
        DB::table('addresses')->insert([
            'user_id' => 1,
            'phone' => '705-312-0694',
            'city' => 'Peterborough',
            'province_id' => 6,
            'address' => '2319  George Street',
            'postal_code' => 'K9H 2L1',
            'default' => 1,
        ]);

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

        //mongodb
        // ProductDetail::on('mongodb')->insert([
        //     'id' => 1,
        //     'description' => [
        //         ['title' => 'Best connectivity', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
        //         ['title' => 'Long battery life', 'text' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
        //         ['title' => 'Crystal clear sound', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
        //         ['title' => 'Bluetooth 4.1', 'text' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
        //     ],
        //     'summary_list' => [
        //         'Lorem ipsum 5%',
        //         'dolor 3 sit amet',
        //         'Amet consectetur adipiscing',
        //         '7 sed do eiusmod tempor incididunt',
        //         '3ghz'
        //     ],
        //     'properties' => [
        //         'Color' => 'Black',
        //         'Batteries' => '1 Lithium Polymer battery required. (included)',
        //         'Dimensions' => '7.5cm x 4cm x 2cm'
        //     ]
        // ]);

        //product details
        DB::table('product_details')->insert([
            'title' => 'Best connectivity',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'product_id' => 1
        ]);
        DB::table('product_details')->insert([
            'title' => 'Long battery life',
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'product_id' => 1
        ]);
        DB::table('product_details')->insert([
            'title' => 'Crystal clear sound',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'product_id' => 1
        ]);
        DB::table('product_details')->insert([
            'title' => 'Bluetooth 4.1',
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'product_id' => 1
        ]);

        //product summary
        DB::table('product_summaries')->insert([
            'summary' => 'Lorem ipsum 5%',
            'product_id' => 1
        ]);
        DB::table('product_summaries')->insert([
            'summary' => 'dolor 3 sit amet',
            'product_id' => 1
        ]);
        DB::table('product_summaries')->insert([
            'summary' => 'Amet consectetur adipiscing',
            'product_id' => 1
        ]);
        DB::table('product_summaries')->insert([
            'summary' => '7 sed do eiusmod tempor incididunt',
            'product_id' => 1
        ]);

        //product properties
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

        //images
        DB::table('images')->insert([
            'product_id' => 1,
            'path' => 'storage/product images/earphone.jpg'
        ]);
        DB::table('images')->insert([
            'product_id' => 1,
            'path' => 'storage/product images/earphone2.jpg'
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
            'path' => 'storage/product images/jacket.jpg'
        ]);
        DB::table('images')->insert([
            'product_id' => 6,
            'path' => 'storage/product images/shoes.jpg'
        ]);
        DB::table('images')->insert([
            'product_id' => 7,
            'path' => 'storage/product images/socks.jpg'
        ]);
        DB::table('images')->insert([
            'product_id' => 8,
            'path' => 'storage/product images/tshirt.jpg'
        ]);
        DB::table('images')->insert([
            'product_id' => 9,
            'path' => 'storage/product images/pants.jpg'
        ]);
    }
}
