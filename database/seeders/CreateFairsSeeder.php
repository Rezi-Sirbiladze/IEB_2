<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fair;
use Carbon\Carbon;

class CreateFairsSeeder extends Seeder
{
    public function run()
    {
        Fair::insert(array(
            'name' => 'Fira',
            'description' => "La FIRA és un esdeveniment organitzat per l'alumnat de 2n del Cicle Superior de Condicionament Físic de l'Institut de l'Esport de Barcelona amb la intenció de promoure la pràctica d'exercici físic en població jove, donar a conèixer el nostre Institut així com fomentar els valors solidaris amb una especial col·laboració amb Tienda Solidaria Piel de Mariposa.
            Gaudirem d'un matí amb diverses activitats i tallers dirigits pels mateixos alumnes.
            Fem esport solidari!",
            'date' => '2023-04-21',
            'image_path' => 'fira.jpg',
            'created_at' => Carbon::now(),
        ));

        Fair::insert(array(
            'active' => true,
            'name' => 'Fira',
            'description' => "La FIRA és un esdeveniment organitzat per l'alumnat de 2n del Cicle Superior de Condicionament Físic de l'Institut de l'Esport de Barcelona amb la intenció de promoure la pràctica d'exercici físic en població jove, donar a conèixer el nostre Institut així com fomentar els valors solidaris amb una especial col·laboració amb Tienda Solidaria Piel de Mariposa.
            Gaudirem d'un matí amb diverses activitats i tallers dirigits pels mateixos alumnes.
            Fem esport solidari!",
            'date' => '2024-04-21',
            'image_path' => 'fira.jpg',
            'created_at' => Carbon::now(),
        ));
    }
}
