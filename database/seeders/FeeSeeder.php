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
                'role_id' => $roles->firstWhere('key', 'doctor')->id,
                'event' => 'conference_registration',
                'currency' => 'INR',
                'early_bird_amount' => 12000,
                'standard_amount' => 13000,
                'spot_amount' => 15000,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'nur_para')->id,
                'event' => 'conference_registration',
                'currency' => 'INR',
                'early_bird_amount' => 3000,
                'standard_amount' => 3500,
                'spot_amount' => 5000,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'student')->id,
                'event' => 'conference_registration',
                'currency' => 'INR',
                'early_bird_amount' => 3000,
                'standard_amount' => 3500,
                'spot_amount' => 5000,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'student')->id,
                'event' => 'conference_registration',
                'currency' => 'USD',
                'early_bird_amount' => 150,
                'standard_amount' => 170,
                'spot_amount' => 200,
            ],
            [
                'role_id' => $roles->firstWhere('key', 'accompanying_person')->id,
                'event' => 'conference_registration',
                'currency' => 'INR',
                'early_bird_amount' => 8000,
                'standard_amount' => 8000,
                'spot_amount' => 8000,
            ],
        ];

        foreach ($fees as $fee) {
            Fee::create($fee);
        }
    }
}
