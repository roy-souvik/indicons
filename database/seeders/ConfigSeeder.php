<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_configs')->truncate();

        $configList = [
            [
                'name' => 'pick_drop_price',
                'value' => '3000',
            ],
            [
                'name' => 'workshop_price',
                'value' => '3000',
            ],
            [
                'hotel_booking_start',
                'value' => '2025-09-01',
            ],
            [
                'hotel_booking_end',
                'value' => '2025-09-05',
            ]
        ];

        SiteConfig::insert($configList);
    }
}
