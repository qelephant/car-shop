<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\Body::all()->count() == 0) {
            // Массив типов машин
            $data = [
                1 => [
                    'name' => 'Легковые',
                    'slug' => 'Legkovyye',
                ],
                2 => [
                    'name' => 'Внедорожники и пикапы',
                    'slug' => 'Vnedorozhniki-pikapy',
                ],
                3 => [
                    'name' => 'Минивены и микроавтобусы',
                    'slug' => 'Miniveny-mikroavtobusy',
                ],
            ];
            // Добавление типов машин
            foreach ($data as $i) {
                \App\Models\Body::create($i);
            }

        }
    }
}
