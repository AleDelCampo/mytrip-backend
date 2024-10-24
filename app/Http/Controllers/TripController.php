<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function index()
    {
        // Carica tutti i viaggi con le giornate e le tappe correlate
        return response()->json(Trip::with('days.stops')->get())
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function showTripsPage()
    {
        // Recupera tutti i viaggi
        $trips = Trip::all();

        // Ritorna la vista con i dati dei viaggi
        return view('trips.index', ['trips' => $trips]);
    }
    public function create()
    {
        return view('trips.create'); // Vista per il form di creazione
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $trip = Trip::create($data);

        // Per API
        if ($request->wantsJson()) {
            return response()->json(['trip' => $trip], 201);
        }

        // Per il rendering della vista
        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

    public function show($id)
    {
        // Carica il viaggio insieme alle giornate e alle fermate
        $trip = Trip::with('days.stops')->find($id);

        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }

        return response()->json($trip);
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.edit', compact('trip')); // Vista per il form di modifica
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Validazione per l'immagine
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $trip->update($data);
        return redirect()->route('trips.index');
    }

    public function destroy($id)
    {
        Trip::destroy($id);
        return redirect()->route('trips.index');
    }

    public function getTripDetails($tripId)
    {
        $trip = Trip::with(['days.stops.notes'])->find($tripId);
        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }
        return response()->json($trip);
    }
}
