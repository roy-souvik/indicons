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
            // INDIAN: Early Bird
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
                'delegate_type_id' => 1,
                'registration_period_id' => 1,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'INR',
                'amount' => '13000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 1,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'INR',
                'amount' => '23000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 1,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'INR',
                'amount' => '25000',
            ],

            // Indian: Standard
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'INR',
                'amount' => '13000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'INR',
                'amount' => '14000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'INR',
                'amount' => '25000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'INR',
                'amount' => '27000',
            ],

            // Indian: Late
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 3,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'INR',
                'amount' => '14000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 3,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'INR',
                'amount' => '15000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 3,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'INR',
                'amount' => '27000',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 1,
                'registration_period_id' => 3,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'INR',
                'amount' => '29000',
            ],

            // SAARC: Early Bird
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 1,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '150',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 1,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '180',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 1,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '300',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 1,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '325',
            ],

            // SAARC: Standard
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '180',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '200',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '325',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '350',
            ],

            // SAARC: Late

            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '200',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '220',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '360',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 2,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '360',
            ],

            // SAARC: Early Bird
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 1,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '150',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 1,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '180',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 1,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '300',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 1,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '325',
            ],

            // SAARC: Standard
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '180',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '200',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '325',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '350',
            ],

            // SAARC: Late
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '200',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'Delux',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '220',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Single',
                'currency' => 'USD',
                'amount' => '360',
            ],
            [
                'hotel_id' => 1,
                'delegate_type_id' => 3,
                'registration_period_id' => 2,
                'room_category' => 'SUITE',
                'description' => 'Double',
                'currency' => 'USD',
                'amount' => '360',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
