<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshops')->truncate();

        $workshopList = [
            // Day 1 - 07.11.2025 @ AIIMS KALYANI
            [
                'name' => 'Forensic Nursing',
                'description' => '<p><strong>Convenor:</strong> Ms Poonam Joshi</p><p><strong>Co-Convenor:</strong> Ms. Geeta Parwanda</p>',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp,
                'end_date' => Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp,
            ],
            [
                'name' => 'Forensic Dentistry',
                'description' => '<p><strong>Convenor:</strong> Prof. Ajay Chhabra</p><p><strong>Co-Convenor:</strong> Dr. Parul Khare Sinha</p>',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp,
                'end_date' => Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp,
            ],
            [
                'name' => 'Medical Certification of Cause of Death (MCCD)',
                'description' => '<p><strong>Convenor:</strong> Prof. Gambhir Singh</p><p><strong>Co-Convenor:</strong> Dr. Ninad Najrale</p>',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp,
                'end_date' => Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp,
            ],

            // Day 2 - 08.11.2025 @ WBNUJS, KOLKATA
            [
                'name' => 'Crime Scene Management',
                'description' => '<p><strong>Convenor:</strong> Dr Tanurup Das, WBNUJS, Kolkata</p><p><strong>Co-Convenor:</strong> Dr. Neetu Mishra, Lucknow</p>',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp,
                'end_date' => Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp,
            ],
            [
                'name' => 'Forensic Toxicology',
                'description' => '<p><strong>Convenor:</strong> Dr Bhavya Srivastava, WBNUJS, Kolkata</p><p><strong>Co-Convenor:</strong> Dr. Anita Yadav, Bhopal</p>',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp,
                'end_date' => Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp,
            ],
            [
                'name' => 'Workshop on POCSO (British Council)',
                'description' => '<p><strong>Convenor:</strong> TBD</p><p><strong>Co-Convenor:</strong> TBD</p>',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp,
                'end_date' => Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp,
            ],
        ];

        Workshop::insert($workshopList);
    }
}
