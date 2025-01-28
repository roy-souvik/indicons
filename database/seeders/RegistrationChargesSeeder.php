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
        DB::table('registration_charges')->truncate();

        $data = [
            // Indian Charges
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 1, 'currency' => 'INR', 'amount' => 15000],
            ['role_id' => 2, 'event' => 'physical_conference','category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 1, 'currency' => 'INR', 'amount' => 18000],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 1, 'currency' => 'INR', 'amount' => 20000],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 2, 'currency' => 'INR', 'amount' => 17000],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 2, 'currency' => 'INR', 'amount' => 20000],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 2, 'currency' => 'INR', 'amount' => 22000],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 3, 'currency' => 'INR', 'amount' => 18000],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 3, 'currency' => 'INR', 'amount' => 22000],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 3, 'currency' => 'INR', 'amount' => 25000],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 1, 'registration_period_id' => 4, 'currency' => 'INR', 'amount' => 20000],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 1, 'registration_period_id' => 4, 'currency' => 'INR', 'amount' => 25000],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 1, 'registration_period_id' => 4, 'currency' => 'INR', 'amount' => 30000],

            // SAARC Charges
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 1, 'currency' => 'USD', 'amount' => 200],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 1, 'currency' => 'USD', 'amount' => 250],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 1, 'currency' => 'USD', 'amount' => 300],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 2, 'currency' => 'USD', 'amount' => 230],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 2, 'currency' => 'USD', 'amount' => 300],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 2, 'currency' => 'USD', 'amount' => 350],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 3, 'currency' => 'USD', 'amount' => 250],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 3, 'currency' => 'USD', 'amount' => 350],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 3, 'currency' => 'USD', 'amount' => 400],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 2, 'registration_period_id' => 4, 'currency' => 'USD', 'amount' => 300],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 2, 'registration_period_id' => 4, 'currency' => 'USD', 'amount' => 400],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 2, 'registration_period_id' => 4, 'currency' => 'USD', 'amount' => 500],

            // International Charges
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 1, 'currency' => 'USD', 'amount' => 400],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 1, 'currency' => 'USD', 'amount' => 500],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 1, 'currency' => 'USD', 'amount' => 600],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 2, 'currency' => 'USD', 'amount' => 500],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 2, 'currency' => 'USD', 'amount' => 600],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 2, 'currency' => 'USD', 'amount' => 700],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 3, 'currency' => 'USD', 'amount' => 600],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 3, 'currency' => 'USD', 'amount' => 700],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 3, 'currency' => 'USD', 'amount' => 800],
            ['role_id' => 3, 'event' => 'physical_conference', 'category' => 'UG / Nurse', 'delegate_type_id' => 3, 'registration_period_id' => 4, 'currency' => 'USD', 'amount' => 700],
            ['role_id' => 2, 'event' => 'physical_conference', 'category' => 'PG / MSc / PhD', 'delegate_type_id' => 3, 'registration_period_id' => 4, 'currency' => 'USD', 'amount' => 800],
            ['role_id' => 4, 'event' => 'physical_conference', 'category' => 'Delegate', 'delegate_type_id' => 3, 'registration_period_id' => 4, 'currency' => 'USD', 'amount' => 900],
        ];

        DB::table('registration_charges')->insert($data);
    }
}
