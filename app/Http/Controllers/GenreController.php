<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Personne;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('genres.index',compact('genres'));
    }

    public function show(Genre $genre){
        return view('genres.show',compact('genre'));
    }

    public function create() {
        return view('genres.create');
    }

    public function store(Request $request) {
        request()->validate([
            'libGenre' => 'required|string',
        ]);

        $g = new Genre();
        $g->libGenre = request('libGenre');
        $g->save();

        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre){
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $genre->update([
            'libGenre' => $request->libGenre,
        ]);

        return response()->json([
            'message' => 'Film mis à jour !',
            'genre' => $genre
        ]);
    }
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return response()->json([
            'message' => 'Film supprimé avec succès !'
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
