<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Trip;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        return view('days.index', ['days' => Day::all()]);
    }

    public function create()
    {
        // Ottieni tutti i trip per il dropdown
        $trips = Trip::all();
        return view('days.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
        ]);

        $day = Day::create($validatedData);
        return redirect()->route('days.index')->with('success', 'Day created successfully');
    }

    public function show($id)
    {
        $day = Day::find($id);
        if (!$day) {
            return redirect()->route('days.index')->with('error', 'Day not found');
        }
        return view('days.show', compact('day'));
    }

    public function edit($id)
    {
        $day = Day::find($id);
        $trips = Trip::all(); // Recupera tutti i trip per il dropdown

        if (!$day) {
            return redirect()->route('days.index')->with('error', 'Day not found');
        }

        return view('days.edit', compact('day', 'trips'));
    }

    public function update(Request $request, $id)
    {
        $day = Day::find($id);

        if (!$day) {
            return redirect()->route('days.index')->with('error', 'Day not found');
        }

        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
        ]);

        $day->update($validatedData);
        return redirect()->route('days.index')->with('success', 'Day updated successfully');
    }

    public function destroy($id)
    {
        $day = Day::find($id);

        if (!$day) {
            return redirect()->route('days.index')->with('error', 'Day not found');
        }

        $day->delete();
        return redirect()->route('days.index')->with('success', 'Day deleted successfully');
    }
}
