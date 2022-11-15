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
                'name' => 'early_bird',
                'value' => '2022-12-15',
            ],
            [
                'name' => 'standard',
                'value' => '2022-12-15',
            ],
            [
                'name' => 'spot',
                'value' => '2023-01-29',
            ],
        ];

        SiteConfig::insert($configList);
    }
}
