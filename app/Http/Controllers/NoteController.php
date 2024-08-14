<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    public function show($id)
    {
        return Note::find($id);
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        $note->update($request->all());
        return response()->json($note, 200);
    }

    public function destroy($id)
    {
        Note::destroy($id);
        return response()->json(null, 204);
    }
}