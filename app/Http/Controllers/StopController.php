<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Models\Image;
use App\Models\Rating;
use Illuminate\Http\Request;


class StopController extends Controller
{
    public function index()
    {
        // Recupera tutte le tappe con le immagini e le valutazioni correlate
        return Stop::with('images', 'rating')->get();
    }

    public function store(Request $request)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|max:2048', // Valida ogni immagine
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        // Crea la tappa
        $stop = Stop::create($validatedData);

        // Salva le immagini
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $stop->images()->create(['path' => $path]);
            }
        }

        // Salva la valutazione
        if ($request->has('rating')) {
            $stop->rating()->create(['rating' => $request->rating]);
        }

        return response()->json($stop->load('images', 'rating'), 201);
    }

    public function show($id)
    {
        // Recupera la tappa con le immagini e la valutazione correlate
        $stop = Stop::with('images', 'rating')->find($id);

        if (!$stop) {
            return response()->json(['error' => 'Tappa non trovata'], 404);
        }

        return response()->json($stop);
    }

    public function update(Request $request, $id)
    {
        // Trova la tappa da aggiornare
        $stop = Stop::find($id);

        if (!$stop) {
            return response()->json(['error' => 'Tappa non trovata'], 404);
        }

        // Validazione dei dati
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        // Aggiorna la tappa
        $stop->update($validatedData);

        // Aggiorna le immagini
        if ($request->has('images')) {
            // Rimuovi le vecchie immagini se necessario
            $stop->images()->delete();

            // Aggiungi le nuove immagini
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $stop->images()->create(['path' => $path]);
            }
        }

        // Aggiorna la valutazione
        if ($request->has('rating')) {
            // Verifica se esiste già una valutazione e aggiornala
            if ($stop->rating) {
                $stop->rating->update(['rating' => $request->rating]);
            } else {
                $stop->rating()->create(['rating' => $request->rating]);
            }
        }

        return response()->json($stop->load('images', 'rating'), 200);
    }

    public function destroy($id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return response()->json(['error' => 'Tappa non trovata'], 404);
        }

        // Elimina le immagini correlate
        $stop->images()->delete();

        // Elimina la valutazione correlata
        if ($stop->rating) {
            $stop->rating->delete();
        }

        // Elimina la tappa
        $stop->delete();

        return response()->json(null, 204);
    }
}