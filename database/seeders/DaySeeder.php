<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    public function run()
    {
        // Assicurati che questi ID corrispondano ai record esistenti nella tabella trips
        $tripIds = [20, 21, 22, 23]; // Aggiorna con gli ID reali

        // Popola la tabella days con dati di esempio
        $days = [
            ['trip_id' => $tripIds[0], 'date' => '2024-08-28'],
            ['trip_id' => $tripIds[0], 'date' => '2024-08-29'],
            ['trip_id' => $tripIds[0], 'date' => '2024-08-30'],
            ['trip_id' => $tripIds[1], 'date' => '2024-09-01'],
            ['trip_id' => $tripIds[1], 'date' => '2024-09-02'],
            ['trip_id' => $tripIds[2], 'date' => '2024-09-03'],
            ['trip_id' => $tripIds[2], 'date' => '2024-09-04'],
            ['trip_id' => $tripIds[3], 'date' => '2024-09-05'],
        ];

        foreach ($days as $dayData) {
            Day::create($dayData);
        }
    }
}
