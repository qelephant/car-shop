<?php

namespace Database\Seeders;

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
            CitySeeder::class,
            BodySeeder::class,
            DriveSeeder::class,
            TransmissionSeeder::class,
            WheelSeeder::class,
        ]);


    }
}
