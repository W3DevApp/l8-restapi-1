<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        return $notes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;

        $note->save();
        return response()->json(['message' => 'note created']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $note = Note::findOrFail($request->id);
        $note->title = $request->title;
        $note->content = $request->content;

        $note->save();
        return response()->json(['message' => 'note updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $note = Note::destroy($request->id);
        return response()->json(['message' => 'note deleted']);
    }
}
