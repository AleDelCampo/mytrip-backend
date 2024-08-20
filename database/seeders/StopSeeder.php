<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stop;

class StopSeeder extends Seeder
{
    public function run()
    {
        // Ottieni gli ID dei giorni esistenti
        $dayIds = [4, 5, 6, 7, 8, 9, 10, 11]; // Aggiorna con gli ID reali presenti nella tabella days

        // Popola la tabella stops con dati di esempio
        $stops = [
            ['day_id' => $dayIds[0], 'location' => 'Atene', 'latitude' => 37.9838, 'longitude' => 23.7275],
            ['day_id' => $dayIds[0], 'location' => 'Plaka', 'latitude' => 37.9643, 'longitude' => 23.9991],
            ['day_id' => $dayIds[1], 'location' => 'Roma', 'latitude' => 41.9028, 'longitude' => 12.4964],
            ['day_id' => $dayIds[1], 'location' => 'Firenze', 'latitude' => 43.7696, 'longitude' => 11.2558],
            ['day_id' => $dayIds[2], 'location' => 'Città del Guatemala', 'latitude' => 14.6349, 'longitude' => -90.5069],
            ['day_id' => $dayIds[2], 'location' => 'Antigua', 'latitude' => 14.5507, 'longitude' => -90.7338],
            ['day_id' => $dayIds[3], 'location' => 'Marrakech', 'latitude' => 31.6295, 'longitude' => -7.9811],
        ];

        foreach ($stops as $stopData) {
            Stop::create($stopData);
        }
    }
}


