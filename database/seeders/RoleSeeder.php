<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $roles = [
            [
                'name' => 'Super Admin',
                'key' => 'super_admin',
                'is_active' => false,
            ],
            [
                'name' => 'PG / MSc / PhD',
                'key' => 'pg_msc_phd',
                'is_active' => true,
            ],
            [
                'name' => 'UG / Nurse',
                'key' => 'ug_nurse',
                'is_active' => true,
            ],
            [
                'name' => 'Delegate',
                'key' => 'delegate',
                'is_active' => true,
            ],
            [
                'name' => 'Accompanying Person',
                'key' => 'accompanying_person',
                'is_active' => false,
            ],
            [
                'name' => 'Sponsor',
                'key' => 'sponsor',
                'is_active' => false,
            ],
            [
                'name' => 'Workshop Attendee',
                'key' => 'workshop_attendee',
                'is_active' => false,
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
