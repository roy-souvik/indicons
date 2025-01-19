<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrationPeriods = [
            ['name' => 'Early Bird', 'date' => '2025-03-31', 'is_active' => true],
            ['name' => 'Standard', 'date' => '2025-06-30', 'is_active' => true],
            ['name' => 'Late', 'date' => '2025-08-31', 'is_active' => true],
            ['name' => 'Spot', 'date' => null, 'is_active' => true],
        ];

        DB::table('registration_periods')->insert($registrationPeriods);
    }
}
