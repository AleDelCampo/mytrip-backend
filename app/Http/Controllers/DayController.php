<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        return Day::all();
    }

    public function store(Request $request)
    {
        $day = Day::create($request->all());
        return response()->json($day, 201);
    }

    public function show($id)
    {
        return Day::find($id);
    }

    public function update(Request $request, $id)
    {
        $day = Day::find($id);
        $day->update($request->all());
        return response()->json($day, 200);
    }

    public function destroy($id)
    {
        Day::destroy($id);
        return response()->json(null, 204);
    }
}