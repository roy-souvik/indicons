<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmins = [
            [
                'name' => 'Inpalams Admin',
                'title' => 'Mr',
                'email' => 'contact@inpalams2025.in',
                'email_verified_at' => now()->timestamp,
                'password' => Hash::make(env('INDICONS_ADMIN_PASS')),
                'phone' => '8910142514',
                'role_id' => Role::firstWhere('key', 'super_admin')->id,
                'delegate_type_id' => 1,
                'company' => 'admin',
                'postal_code' => '700001',
                'city' => 'city',
                'country' => 'India',
                'department' => 'department',
                'address' => 'address',
            ],
        ];

        foreach ($superAdmins as $superAdmin) {
            User::create($superAdmin);
        }
    }
}
