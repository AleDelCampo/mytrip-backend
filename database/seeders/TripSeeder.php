<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    public function run()
    {
        Trip::query()->delete(); // Pulisce la tabella Trips prima di inserire nuovi dati

        $trips = [
            [
                'title' => 'Viaggio a Grecia',
                'description' => 'Un meraviglioso viaggio attraverso la Grecia.',
            ],
            [
                'title' => 'Viaggio in Italia',
                'description' => 'Esplora le meraviglie dell\'Italia.',
            ],
            [
                'title' => 'Viaggio in Guatemala',
                'description' => 'Scopri le bellezze naturali e culturali del Guatemala.',
            ],
            [
                'title' => 'Viaggio nel Sahara',
                'description' => 'Un\'avventura nel deserto del Sahara.',
            ],
        ];

        foreach ($trips as $tripData) {
            Trip::create($tripData); 
        }
    }
}
