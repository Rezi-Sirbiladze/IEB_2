<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MediaLinks;
use Carbon\Carbon;

class CreateMediaLinksSeeder extends Seeder
{
    public function run()
    {
        MediaLinks::insert(array(
            'media_type' => 'indexVideo',
            'media_path' => 'fira.mp4',
            'created_at' => Carbon::now(),
        ));

        MediaLinks::insert(array(
            'media_type' => 'map',
            'media_path' => 'mapa.png',
            'created_at' => Carbon::now(),
        ));

        MediaLinks::insert(array(
            'media_type' => 'mapLeg',
            'media_path' => 'mapaLeg.png',
            'created_at' => Carbon::now(),
        ));
    }
}
