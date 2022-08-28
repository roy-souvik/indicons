<?php

namespace Database\Seeders;

use App\Models\Workshop;
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
            [
                'name' => 'Workshop One',
                'description' => 'Workshop one description',
            ],
        ];

        Workshop::insert($workshopList);
    }
}
