<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DelegateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $delegateTypes = [
            ['name' => 'indian', 'description' => 'Indian (INR)', 'is_active' => true],
            ['name' => 'saarc', 'description' => 'SAARC (Non Indian) USD', 'is_active' => true],
            ['name' => 'international', 'description' => 'International(Non SAARC) USD', 'is_active' => true],
        ];

        DB::table('delegate_types')->insert($delegateTypes);
    }
}
