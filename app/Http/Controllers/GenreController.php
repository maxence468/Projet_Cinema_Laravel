<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Personne;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(Request $request){
        $genres = Genre::all();
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['genres' => $genres]);
        }
        return view('genres.index',compact('genres'));
    }

    public function show(Genre $genre){
        return view('genres.show',compact('genre'));
    }

    public function create() {
        return view('genres.create');
    }

    public function store(Request $request) {
        $request->validate([
            'libGenre' => 'required|string',
        ]);

        $g = new Genre();
        $g->libGenre = $request->libGenre;
        $g->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['genre' => $g]);
        }
        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre){
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, $id){
        request()->validate([
            'libGenre' => 'required|string',
        ]);

        $genre = Genre::findOrFail($id);

        $genre->update([
            'libGenre' => $request->libGenre,
        ]);

        return response()->json([
            'message' => 'Genre mis à jour !',
            'genre' => $genre
        ]);
    }
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return response()->json([
            'message' => 'Genre supprimé avec succès !'
        ]);
    }

    public function editGenre(Request $request){
        $id = $request->idGenre;
        $genre = Genre::find($id);

        return response()->json([
            'genre'=> $genre,
        ]);
}
}
