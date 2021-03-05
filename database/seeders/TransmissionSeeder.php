<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\Transmission::all()->count() == 0) {
            // Массив типов КПП
            $data = [
                1 => [
                    'name' => 'Механика',
                    'slug' => 'mekhanika',
                ],
                2 => [
                    'name' => 'Автомат',
                    'slug' => 'avtomat',
                ],
                3 => [
                    'name' => 'Типтроник',
                    'slug' => 'tiptronik',
                ],
                4 => [
                    'name' => 'Робот',
                    'slug' => 'robot',
                ],
            ];
            // Добавление типов КПП
            foreach ($data as $i) {
                \App\Models\Transmission::create($i);
            }

        }
    }
}
