<?php

namespace Database\Seeders;

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
        $roles = Role::active()->get();

        $paymentSlab = [
            [
                'role_id' => $roles->firstWhere('key', 'doctor')->id,
                'type' => '',
                'event' => 'conference_registration',
                'amount' => 12000,
                'currency' => 'INR',
                'early_bird_registration_fees' => number_format(12000/78, 2),
                'standard_registration_fees' => number_format(13000/78, 2),
                'spot_registration_fees' => number_format(15000/78, 2),
            ],
            [
                'role' => 'nurs_and_paramedic',
                'currency' => 'USD',
                'early_bird_registration_fees' => number_format(3000/78, 2),
                'standard_registration_fees' => number_format(3500/78, 2),
                'spot_registration_fees' => number_format(5000/78, 2),
            ],
            [
                'role' => 'student',
                'currency' => 'USD',
                'early_bird_registration_fees' => number_format(3000/78, 2),
                'standard_registration_fees' => number_format(3500/78, 2),
                'spot_registration_fees' => number_format(5000/78, 2),
            ],
            [
                'role' => 'international_deligate',
                'currency' => 'USD',
                'early_bird_registration_fees' => 150,
                'standard_registration_fees' => 170,
                'spot_registration_fees' => 200,
            ],
        ];
    }
}
