<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * getRandomWeightedElement()
     * Utility function for getting random values with weighting.
     * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
     * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
     * The return value is the array key, A, B, or C in this case.  Note that the values assigned
     * do not have to be percentages.  The values are simply relative to each other.  If one value
     * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
     * chance of being selected.  Also note that weights should be integers.
     *
     * @param array $weightedValues
     */
    function getRandomWeightedElement(array $weightedValues)
    {
        $rand = mt_rand(1, (int) array_sum($weightedValues));

        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($p = 1; $p <= 12; $p++) {
            for ($n = 1; $n <= 100; $n++) {
                $stars = $this->getRandomWeightedElement([1 => 10, 2 => 5, 3 => 7, 4 => 9, 5 => 69]);

                DB::table('reviews')->insert([
                    'product_id' => $p,
                    'user_id' => $n,
                    'title' => ($stars < 3 ? 'Bad product' : '') . ($stars == 3 ? 'Acceptable product' : '') . ($stars > 3 ? 'Great product' : ''),
                    'review' => file_get_contents('http://loripsum.net/api/1/plaintext'),
                    'stars' => $stars,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
