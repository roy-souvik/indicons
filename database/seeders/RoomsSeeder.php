<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->truncate();

        $rooms = [
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 1,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'INR',
                'amount' => '12000',
            ],
            [
                'hotel_id' => 1,
                'room_category' => 'Towers',
                'amount' => '11000',
            ],
            [
                'hotel_id' => 2,
                'room_category' => 'Superior Room',
                'amount' => '7000',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
