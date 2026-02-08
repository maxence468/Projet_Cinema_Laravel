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

    public function update(Request $request, Genre $genre){
        request()->validate([
            'libGenre' => 'required|string',
        ]);

        $genre->libGenre = request('libGenre');
        $genre->save();

        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre){
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
