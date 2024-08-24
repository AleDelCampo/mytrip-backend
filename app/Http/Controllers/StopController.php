<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Models\Day;
use App\Models\Note;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index()
    {
        // Recupera tutte le tappe con le immagini e le valutazioni correlate
        return view('stops.index', ['stops' => Stop::with('images', 'rating')->get()]);
    }

    public function create()
    {
        $days = Day::all(); // Recupera tutti i giorni per il dropdown
        return view('stops.create', compact('days'));
    }

    public function store(Request $request)
    {
        // Validazione dei dati
        $validatedData = $request->validate([
            'day_id' => 'required|exists:days,id',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
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

        return redirect()->route('stops.index')->with('success', 'Stop created successfully');
    }

    public function show($id)
    {
        // Recupera la tappa con le immagini e la valutazione correlate
        $stop = Stop::with('images', 'rating')->find($id);

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        return view('stops.show', compact('stop'));
    }

    public function edit($id)
    {
        $stop = Stop::find($id);
        $days = Day::all(); // Recupera tutti i giorni per il dropdown

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        return view('stops.edit', compact('stop', 'days'));
    }

    public function update(Request $request, $id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        // Validazione dei dati
        $validatedData = $request->validate([
            'day_id' => 'required|exists:days,id',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
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

        return redirect()->route('stops.index')->with('success', 'Stop updated successfully');
    }

    public function destroy($id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        // Elimina le immagini correlate
        $stop->images()->delete();

        // Elimina la valutazione correlata
        if ($stop->rating) {
            $stop->rating->delete();
        }

        // Elimina la tappa
        $stop->delete();

        return redirect()->route('stops.index')->with('success', 'Stop deleted successfully');
    }

    // app/Http/Controllers/StopController.php

    public function rate(Request $request, $id)
    {
        $stop = Stop::findOrFail($id);
        $rating = $request->input('rating');

        // Assicurati di validare l'input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Aggiorna il rating
        $stop->rating = $rating;
        $stop->save();

        return response()->json(['success' => true, 'rating' => $stop->rating]);
    }

    public function addNote(Request $request, $stopId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $note = new Note();
        $note->content = $request->input('content');
        $note->stop_id = $stopId;
        $note->save();

        return response()->json($note, 201);
    }
}
