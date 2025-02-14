<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->truncate();

        $roles = Role::all();

        $fees = [
            [
                'role_id' => $roles->firstWhere('key', 'pg_msc_phd')->id,
                'event' => 'physical_conference',
                'currency' => 'INR',
                'early_bird_amount' => 12000,
                'standard_amount' => 13000,
                'spot_amount' => 15000,
                'early_bird_member_discount' => 0,
                'standard_member_discount' => 0,
                'spot_member_discount' => 0,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'ug_nurse')->id,
                'event' => 'physical_conference',
                'currency' => 'INR',
                'early_bird_amount' => 3000,
                'standard_amount' => 3500,
                'spot_amount' => 5000,
                'early_bird_member_discount' => 0,
                'standard_member_discount' => 0,
                'spot_member_discount' => 0,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'ug_nurse')->id,
                'event' => 'physical_conference',
                'currency' => 'INR',
                'early_bird_amount' => 3000,
                'standard_amount' => 3500,
                'spot_amount' => 5000,
                'early_bird_member_discount' => 0,
                'standard_member_discount' => 0,
                'spot_member_discount' => 0,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'delegate')->id,
                'event' => 'physical_conference',
                'currency' => 'USD',
                'early_bird_amount' => 150,
                'standard_amount' => 170,
                'spot_amount' => 200,
                'early_bird_member_discount' => 0,
                'standard_member_discount' => 0,
                'spot_member_discount' => 0,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'accompanying_person')->id,
                'event' => 'physical_conference',
                'currency' => 'INR',
                'early_bird_amount' => 8000,
                'standard_amount' => 8000,
                'spot_amount' => 8000,
                'early_bird_member_discount' => 0,
                'standard_member_discount' => 0,
                'spot_member_discount' => 0,
            ],
        ];

        foreach ($fees as $fee) {
            Fee::create($fee);
        }
    }
}
