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
            ['category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 1, 'amount' => 15000],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 1, 'amount' => 18000],
            ['category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 1, 'amount' => 20000],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 2, 'amount' => 17000],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 2, 'amount' => 20000],
            ['category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 2, 'amount' => 22000],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 3, 'amount' => 18000],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 3, 'amount' => 22000],
            ['category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 3, 'amount' => 25000],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 4, 'amount' => 20000],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 4, 'amount' => 25000],
            ['category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 4, 'amount' => 30000],

            // SAARC Charges
            ['category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 1, 'amount' => 200],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 1, 'amount' => 250],
            ['category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 1, 'amount' => 300],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 2, 'amount' => 230],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 2, 'amount' => 300],
            ['category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 2, 'amount' => 350],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 3, 'amount' => 250],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 3, 'amount' => 350],
            ['category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 3, 'amount' => 400],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 4, 'amount' => 300],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 4, 'amount' => 400],
            ['category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 4, 'amount' => 500],

            // International Charges
            ['category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 1, 'amount' => 400],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 1, 'amount' => 500],
            ['category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 1, 'amount' => 600],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 2, 'amount' => 500],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 2, 'amount' => 600],
            ['category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 2, 'amount' => 700],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 3, 'amount' => 600],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 3, 'amount' => 700],
            ['category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 3, 'amount' => 800],
            ['category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 4, 'amount' => 700],
            ['category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 4, 'amount' => 800],
            ['category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 4, 'amount' => 900],
        ];

        DB::table('registration_charges')->insert($data);
    }
}
