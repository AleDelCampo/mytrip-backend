<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function index()
    {
        return response()->json(Trip::all()); // Vista per elencare tutti i viaggi
    }

    public function create()
    {
        return view('trips.create'); // Vista per il form di creazione
    }

    public function store(Request $request)
    {
        $trip = Trip::create($request->all());
        return redirect()->route('trips.index');
    }

    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.show', compact('trip')); // Vista per mostrare un viaggio specifico
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.edit', compact('trip')); // Vista per il form di modifica
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        return redirect()->route('trips.index');
    }

    public function destroy($id)
    {
        Trip::destroy($id);
        return redirect()->route('trips.index');
    }
}
