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
                'email' => 'contact@inpalms2025.com',
                'email_verified_at' => now()->timestamp,
                'password' => Hash::make(env('INPALMS_ADMIN_PASS')),
                'phone' => '8910142514',
                'role_id' => Role::firstWhere('key', 'super_admin')->id,
                'delegate_type_id' => 1,
                'company' => 'Edumed Infotech',
                'postal_code' => '700106',
                'city' => 'Kolkata',
                'country' => 'India',
                'department' => 'department',
                'address' => 'KB 2/6 SALT LAKE SECTOR III',
            ],
            [
                'name' => 'Abstract Admin',
                'title' => 'Mr',
                'email' => 'abstract-admin@inpalms2025.com',
                'email_verified_at' => now()->timestamp,
                'password' => Hash::make(env('INPALMS_ABSTRACT_ADMIN_PASS')),
                'phone' => '9836216494',
                'role_id' => Role::firstWhere('key', 'super_admin')->id,
                'delegate_type_id' => 1,
                'company' => 'Edumed Infotech',
                'postal_code' => '700106',
                'city' => 'Kolkata',
                'country' => 'India',
                'department' => 'department',
                'address' => 'KB 2/6 SALT LAKE SECTOR III',
            ],
        ];

        foreach ($superAdmins as $superAdmin) {
            User::create($superAdmin);
        }
    }
}
