<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\Drive::all()->count() == 0) {
            // Массив приводов
            $data = [
                1 => [
                    'name' => 'Передний привод',
                    'slug' => 'peredniy-privod',
                ],
                2 => [
                    'name' => 'Полный привод',
                    'slug' => 'polnyy-privod',
                ],
                3 => [
                    'name' => 'Задний привод',
                    'slug' => 'zadniy-privod',
                ],
            ];
            // Добавление приводов
            foreach ($data as $i) {
                \App\Models\Drive::create($i);
            }

        }
    }
}
