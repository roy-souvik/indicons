<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            FeeSeeder::class,
            SponsorshipSeeder::class,
            ConfigSeeder::class,
            WorkshopSeeder::class,
            HotelsSeeder::class,
            RoomSeeder::class,
        ]);
    }
}
