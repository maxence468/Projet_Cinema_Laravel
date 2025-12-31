<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function show(Film $film){
        return view('films.show', compact('film'));
    }

    public function create(){
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'titreFilm' => 'required',
            'descFilm' => 'required',
            'dateSortieFilm' => ['required','date'],
            'dureeFilm' => 'required|integer',
            'posterFilm' => ['required','image'],
            'idGenre' => 'required|exists:genres,idGenre',
        ]);

        $posterPath = $request->file('posterFilm')->store('posters', 'public');

        $f = new Film();
        $f->titreFilm = $validated['titreFilm'];
        $f->descFilm = $validated['descFilm'];
        $f->dateSortieFilm = $validated['dateSortieFilm'];
        $f->dureeFilm = $validated['dureeFilm'];
        $f->posterFilm = $posterPath;
        $f->idGenre = $validated['idGenre'];

        $f->save();

        return redirect('/films/'.$f->idFilm)->with('success', 'Film créé avec succès !');
    }

    public function edit(Film $film){
        $genres = Genre::all();
        return view('films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $data = $request->only([
            'titreFilm',
            'descFilm',
            'dateSortieFilm',
            'dureeFilm',
            'idGenre'
        ]);

        $film->update(array_filter($data));

        return redirect('/films/' . $film->idFilm);
    }

    public function destroy(Film $film){
        $film->delete();
        return redirect('/films');
    }



}
