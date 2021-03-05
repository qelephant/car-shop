<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\City::all()->count() == 0) {

            // массив для добавления городов
            $data = [
                1 => [
                    'name' => 'Нур-Султан',
                    'activity' => 1,
                    'latitude' => '51.1605227',
                    'longitude' => '71.4703558',
                ],
                2 => [
                    'name' => 'Алматы',
                    'activity' => 1,
                    'latitude' => '43.2220146',
                    'longitude' => '76.8512485',
                ],
                3 => [
                    'name' => 'Актау',
                    'activity' => 1,
                    'latitude' => '43.6588079',
                    'longitude' => '51.1974563',
                ],
                4 => [
                    'name' => 'Кокшетау',
                    'activity' => 1,
                    'latitude' => '53.2871307',
                    'longitude' => '69.4044493',
                ],
                5 => [
                    'name' => 'Караганды',
                    'activity' => 1,
                    'latitude' => '49.8046834',
                    'longitude' => '73.1093826',
                ],
                6 => [
                    'name' => 'Уральск',
                    'activity' => 1,
                    'latitude' => '51.227821',
                    'longitude' => '73.1093826',
                ],
                7 => [
                    'name' => 'Костанай',
                    'activity' => 1,
                    'latitude' => '51.227821',
                    'longitude' => '73.1093826',
                ],
                8 => [
                    'name' => 'Актобе',
                    'activity' => 1,
                    'latitude' => '50.2839338',
                    'longitude' => '57.1669780',
                ],
                9 => [
                    'name' => 'Кызылорда',
                    'activity' => 1,
                    'latitude' => '44.8488313',
                    'longitude' => '65.4822686',
                ],
            ];

            foreach ($data as $i) {
                // добавление городов
                \App\Models\City::create($i);
            }

        }

    }
}
