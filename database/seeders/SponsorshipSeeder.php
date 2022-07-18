<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsorships')->truncate();

        $sponsorships = [
            [
                'category' => 'main',
                'title' => 'Platinum +',
                'amount' => '1000000',
            ],
            [
                'category' => 'main',
                'title' => 'Platinum',
                'amount' => '700000',
            ],
            [
                'category' => 'main',
                'title' => 'Diamond',
                'amount' => '500000',
            ],
            [
                'category' => 'main',
                'title' => 'Gold',
                'amount' => '300000',
            ],
            [
                'category' => 'main',
                'title' => 'Silver',
                'amount' => '200000',
            ],
            [
                'category' => 'main',
                'title' => 'Bronze',
                'amount' => '100000',
            ],


            [
                'category' => 'other',
                'title' => 'Named hall (main hall) for the entire conference',
                'amount' => '1000000',
                'number' => 1,
            ],
            [
                'category' => 'other',
                'title' => 'Named hall (small hall) for the entire conference',
                'amount' => '500000',
                'number' => 1,
            ],
            [
                'category' => 'other',
                'title' => 'Named poster presentation hall',
                'amount' => '100000',
                'number' => 1,
            ],
            [
                'category' => 'other',
                'title' => 'Best paper presenter award',
                'amount' => '100000',
                'number' => 3,
            ],
            [
                'category' => 'other',
                'title' => 'Named breakfast sessions',
                'amount' => '100000',
                'number' => 3,
            ],
            [
                'category' => 'other',
                'title' => 'Named lunch sessions',
                'amount' => '250000',
                'number' => 3,
            ],
            [
                'category' => 'other',
                'title' => 'Named tea stations',
                'amount' => '100000',
                'number' => 3,
            ],
            [
                'category' => 'other',
                'title' => 'Named dinner events',
                'amount' => '500000',
                'number' => 2,
            ],
            [
                'category' => 'other',
                'title' => 'Sponsorship ad during scientific session',
                'amount' => '100000',
            ],
            [
                'category' => 'other',
                'title' => 'In hall branding',
                'amount' => '100000',
            ],
            [
                'category' => 'other',
                'title' => 'Branded Souvenirs',
                'amount' => '150000',
            ],
            [
                'category' => 'other',
                'title' => 'Photo zone branding with logo',
                'amount' => '150000',
            ],
            [
                'category' => 'other',
                'title' => 'Named Mobile charging station',
                'amount' => '150000',
            ],
            [
                'category' => 'other',
                'title' => 'Conference bag',
                'amount' => '250000',
            ],
            [
                'category' => 'other',
                'title' => 'Notepad and pen sponsorship',
                'amount' => '100000',
            ],
            [
                'category' => 'other',
                'title' => 'Volunteers dress',
                'amount' => '100000',
            ],
        ];

        foreach ($sponsorships as $sponsorship) {
            Sponsorship::create($sponsorship);
        }
    }
}
