<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stop;
use App\Models\Day;

class StopSeeder extends Seeder
{
    public function run()
    {
        // Recupera gli ID dei giorni esistenti
        $dayIds = Day::pluck('id')->toArray();

        // Mappa giorno -> ID giorno
        $dayMap = [
            'Giorno 1 - Grecia' => $dayIds[0],
            'Giorno 2 - Grecia' => $dayIds[1],
            'Giorno 1 - Italia' => $dayIds[2],
            'Giorno 2 - Italia' => $dayIds[3],
            'Giorno 1 - Guatemala' => $dayIds[4],
            'Giorno 2 - Guatemala' => $dayIds[5],
            'Giorno 1 - Sahara' => $dayIds[6],
        ];

        $stops = [
            ['day_id' => $dayMap['Giorno 1 - Grecia'], 'location' => 'Atene', 'latitude' => 37.9838, 'longitude' => 23.7275],
            ['day_id' => $dayMap['Giorno 2 - Grecia'], 'location' => 'Plaka', 'latitude' => 37.9643, 'longitude' => 23.9991],
            ['day_id' => $dayMap['Giorno 1 - Italia'], 'location' => 'Roma', 'latitude' => 41.9028, 'longitude' => 12.4964],
            ['day_id' => $dayMap['Giorno 2 - Italia'], 'location' => 'Firenze', 'latitude' => 43.7696, 'longitude' => 11.2558],
            ['day_id' => $dayMap['Giorno 1 - Guatemala'], 'location' => 'Città del Guatemala', 'latitude' => 14.6349, 'longitude' => -90.5069],
            ['day_id' => $dayMap['Giorno 2 - Guatemala'], 'location' => 'Antigua', 'latitude' => 14.5507, 'longitude' => -90.7338],
            ['day_id' => $dayMap['Giorno 1 - Sahara'], 'location' => 'Marrakech', 'latitude' => 31.6295, 'longitude' => -7.9811],
        ];

        foreach ($stops as $stopData) {
            Stop::create($stopData);
        }
    }
}
