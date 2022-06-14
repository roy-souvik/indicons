<?php

namespace Database\Seeders;

use App\Models\User;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->truncate();

        $superAdmins = [
            [
                'name' => 'Indicons Admin',
                'email' => 'contact@indicons.com',
                'email_verified_at' => now()->timestamp,
                'password' => Hash::make(env('INDICONS_ADMIN_PASS')),
                'phone' => '9876543212',
                'role' => 'super_admin',
                'company' => 'admin',
                'postal_code' => '122234',
                'city' => 'city',
                'country' => 'country',
                'department' => 'department',
                'address' => 'address',
            ],
        ];

        foreach ($superAdmins as $superAdmin) {
            User::create($superAdmin);
        }
    }
}
