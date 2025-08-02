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

        $dayOneTimestamp = Carbon::createFromFormat('Y-m-d', '2025-11-07')->timestamp;
        $dayTwoTimestamp = Carbon::createFromFormat('Y-m-d', '2025-11-08')->timestamp;

        $workshopList = [
            // Day 1 - 07.11.2025 @ AIIMS KALYANI
            [
                'name' => 'Forensic Nursing',
                'description' => '<p><strong>Convenor:</strong> Ms Poonam Joshi</p><p><strong>Co-Convenor:</strong> Ms. Geeta Parwanda</p>',
                'venue' => 'AIIMS KALYANI',
                'start_date' => $dayOneTimestamp,
                'end_date' => $dayOneTimestamp,
            ],
            [
                'name' => 'Forensic Dentistry',
                'description' => '<p><strong>Convenor:</strong> Prof. Ajay Chhabra</p><p><strong>Co-Convenor:</strong> Dr. Parul Khare Sinha</p>',
                'venue' => 'AIIMS KALYANI',
                'start_date' => $dayOneTimestamp,
                'end_date' => $dayOneTimestamp,
            ],
            [
                'name' => 'Medical Certification of Cause of Death (MCCD)',
                'description' => '<p><strong>Convenor:</strong> Prof. Gambhir Singh</p><p><strong>Co-Convenor:</strong> Dr. Ninad Najrale</p>',
                'venue' => 'AIIMS KALYANI',
                'start_date' => $dayOneTimestamp,
                'end_date' => $dayOneTimestamp,
            ],

            // Day 2 - 08.11.2025 @ WBNUJS, KOLKATA
            [
                'name' => 'Crime Scene Management',
                'description' => '<p><strong>Convenor:</strong> Dr Tanurup Das, WBNUJS, Kolkata</p><p><strong>Co-Convenor:</strong> Dr. Neetu Mishra, Lucknow</p>',
                'venue' => 'WBNUJS, KOLKATA',
                'start_date' => $dayTwoTimestamp,
                'end_date' => $dayTwoTimestamp,
            ],
            [
                'name' => 'Forensic Toxicology',
                'description' => '<p><strong>Convenor:</strong> Dr Bhavya Srivastava, WBNUJS, Kolkata</p><p><strong>Co-Convenor:</strong> Dr. Anita Yadav, Bhopal</p>',
                'venue' => 'WBNUJS, KOLKATA',
                'start_date' => $dayTwoTimestamp,
                'end_date' => $dayTwoTimestamp,
            ],
            [
                'name' => 'Workshop on POCSO (British Council)',
                'description' => '<p><strong>Convenor:</strong> TBD</p><p><strong>Co-Convenor:</strong> TBD</p>',
                'venue' => 'WBNUJS, KOLKATA',
                'start_date' => $dayTwoTimestamp,
                'end_date' => $dayTwoTimestamp,
            ],
        ];

        Workshop::insert($workshopList);
    }
}
