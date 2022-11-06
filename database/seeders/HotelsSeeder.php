<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->truncate();

        $hotels = [
            [
               'name' => 'ITC SONAR',
               'address' => '1, JBS Haldane Ave, Tangra, Kolkata, West Bengal 700046',
            ],
            [
                'name' => 'THE SONNET KOLKATA',
                'address' => 'Plot No. 8, DD Block, Sector 1, Bidhannagar, Kolkata, West Bengal 700064',
             ],
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
