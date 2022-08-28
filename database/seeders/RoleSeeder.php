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
                'name' => 'Doctor',
                'key' => 'doctor',
            ],
            [
                'name' => 'Nurs and paramedic',
                'key' => 'nur_para',
            ],
            [
                'name' => 'Student',
                'key' => 'student',
            ],
            [
                'name' => 'International Deligate',
                'key' => 'int_del',
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
