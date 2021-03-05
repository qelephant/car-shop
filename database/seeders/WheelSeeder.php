<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WheelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\Wheel::all()->count() == 0) {
            // Массив рассположения руля
            $data = [
                1 => [
                    'name' => 'Слева',
                    'slug' => 'left',
                ],
                2 => [
                    'name' => 'Справа',
                    'slug' => 'right',
                ],
            ];
            // Добавление рассположения руля
            foreach ($data as $i) {
                \App\Models\Wheel::create($i);
            }

        }
    }
}
