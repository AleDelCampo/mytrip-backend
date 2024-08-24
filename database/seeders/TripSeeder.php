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
                'title' => 'Viaggio in  Grecia',
                'description' => 'Un meraviglioso viaggio attraverso la Grecia.',
                'image' => 'images/GgxYdx5yEiEpRvxgcDP3Me3usgyea4aqAV4f3xLC.jpg',
            ],
            [
                'title' => 'Viaggio in Italia',
                'description' => 'Esplora le meraviglie dell\'Italia.',
                'image' => 'images/7R6QbJ3XXtkFjW9aE0Sj085b1lMkHJLHM3u90mzO.jpg',
            ],
            [
                'title' => 'Viaggio in Guatemala',
                'description' => 'Scopri le bellezze naturali e culturali del Guatemala.',
                'image' => 'images/PV8EqF8mw65lgiJlVI4ZJSKUOHXhXUFe6aJMBt6n.jpg',
            ],
            [
                'title' => 'Viaggio in Africa',
                'description' => 'Un\'avventura nel deserto del Sahara.',
                'image' => 'images/kBx4ydhBnmmkk6vUxbO5jr503jZYgdNRdhlCiQpS.jpg',
            ],
        ];

        foreach ($trips as $tripData) {
            Trip::create($tripData); 
        }
    }
}
