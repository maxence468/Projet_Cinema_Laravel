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

    public function create(){
        return view('genres.create');
    }
    public function store(Request $request){
        $vali = request()->validate([
          'libGenre'=>'required',
        ]);
        $genre = new Genre();
        $genre->libGenre = $vali['libGenre'];

        $genre->save();

        return redirect('/genres/'.$genre->idGenre);
    }

    public function edit(Genre $genre){
        return view('genres.edit',compact('genre'));
    }

    public function update(Request $request,Genre $genre){
        $data = $request->only([
            'libGenre',
        ]);

        $genre->update(array_filter($data));

        return redirect('/genres/' . $genre->idGenre);
    }

    public function destroy(Genre $genre){
        $genre->delete();
        return redirect('/genres');
    }
}
