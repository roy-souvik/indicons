<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationChargesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Indian Charges
            ['category' => 'UG / Nurse', 'type' => 'INDIAN', 'registration_period' => 'Early Bird', 'amount' => 15000],
            ['category' => 'PG / MSc / PhD', 'type' => 'INDIAN', 'registration_period' => 'Early Bird', 'amount' => 18000],
            ['category' => 'Delegate', 'type' => 'INDIAN', 'registration_period' => 'Early Bird', 'amount' => 20000],
            ['category' => 'UG / Nurse', 'type' => 'INDIAN', 'registration_period' => 'Standard', 'amount' => 17000],
            ['category' => 'PG / MSc / PhD', 'type' => 'INDIAN', 'registration_period' => 'Standard', 'amount' => 20000],
            ['category' => 'Delegate', 'type' => 'INDIAN', 'registration_period' => 'Standard', 'amount' => 22000],
            ['category' => 'UG / Nurse', 'type' => 'INDIAN', 'registration_period' => 'Late', 'amount' => 18000],
            ['category' => 'PG / MSc / PhD', 'type' => 'INDIAN', 'registration_period' => 'Late', 'amount' => 22000],
            ['category' => 'Delegate', 'type' => 'INDIAN', 'registration_period' => 'Late', 'amount' => 25000],
            ['category' => 'UG / Nurse', 'type' => 'INDIAN', 'registration_period' => 'Spot', 'amount' => 20000],
            ['category' => 'PG / MSc / PhD', 'type' => 'INDIAN', 'registration_period' => 'Spot', 'amount' => 25000],
            ['category' => 'Delegate', 'type' => 'INDIAN', 'registration_period' => 'Spot', 'amount' => 30000],

            // SAARC Charges
            ['category' => 'UG / Nurse', 'type' => 'SAARC', 'registration_period' => 'Early Bird', 'amount' => 200],
            ['category' => 'PG / MSc / PhD', 'type' => 'SAARC', 'registration_period' => 'Early Bird', 'amount' => 250],
            ['category' => 'Delegate', 'type' => 'SAARC', 'registration_period' => 'Early Bird', 'amount' => 300],
            ['category' => 'UG / Nurse', 'type' => 'SAARC', 'registration_period' => 'Standard', 'amount' => 230],
            ['category' => 'PG / MSc / PhD', 'type' => 'SAARC', 'registration_period' => 'Standard', 'amount' => 300],
            ['category' => 'Delegate', 'type' => 'SAARC', 'registration_period' => 'Standard', 'amount' => 350],
            ['category' => 'UG / Nurse', 'type' => 'SAARC', 'registration_period' => 'Late', 'amount' => 250],
            ['category' => 'PG / MSc / PhD', 'type' => 'SAARC', 'registration_period' => 'Late', 'amount' => 350],
            ['category' => 'Delegate', 'type' => 'SAARC', 'registration_period' => 'Late', 'amount' => 400],
            ['category' => 'UG / Nurse', 'type' => 'SAARC', 'registration_period' => 'Spot', 'amount' => 300],
            ['category' => 'PG / MSc / PhD', 'type' => 'SAARC', 'registration_period' => 'Spot', 'amount' => 400],
            ['category' => 'Delegate', 'type' => 'SAARC', 'registration_period' => 'Spot', 'amount' => 500],

            // International Charges
            ['category' => 'UG / Nurse', 'type' => 'INTERNATIONAL', 'registration_period' => 'Early Bird', 'amount' => 400],
            ['category' => 'PG / MSc / PhD', 'type' => 'INTERNATIONAL', 'registration_period' => 'Early Bird', 'amount' => 500],
            ['category' => 'Delegate', 'type' => 'INTERNATIONAL', 'registration_period' => 'Early Bird', 'amount' => 600],
            ['category' => 'UG / Nurse', 'type' => 'INTERNATIONAL', 'registration_period' => 'Standard', 'amount' => 500],
            ['category' => 'PG / MSc / PhD', 'type' => 'INTERNATIONAL', 'registration_period' => 'Standard', 'amount' => 600],
            ['category' => 'Delegate', 'type' => 'INTERNATIONAL', 'registration_period' => 'Standard', 'amount' => 700],
            ['category' => 'UG / Nurse', 'type' => 'INTERNATIONAL', 'registration_period' => 'Late', 'amount' => 600],
            ['category' => 'PG / MSc / PhD', 'type' => 'INTERNATIONAL', 'registration_period' => 'Late', 'amount' => 700],
            ['category' => 'Delegate', 'type' => 'INTERNATIONAL', 'registration_period' => 'Late', 'amount' => 800],
            ['category' => 'UG / Nurse', 'type' => 'INTERNATIONAL', 'registration_period' => 'Spot', 'amount' => 700],
            ['category' => 'PG / MSc / PhD', 'type' => 'INTERNATIONAL', 'registration_period' => 'Spot', 'amount' => 800],
            ['category' => 'Delegate', 'type' => 'INTERNATIONAL', 'registration_period' => 'Spot', 'amount' => 900],
        ];

        DB::table('registration_charges')->insert($data);
    }
}
