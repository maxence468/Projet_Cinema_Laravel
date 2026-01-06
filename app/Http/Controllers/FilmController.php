<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create(){
        return view('films.create');
    }

    public function show(Film $film){
        return view('films.show', compact('film'));
    }

    public function store() {
        request()->validate([
            'titreFilm' => 'required|string|max:255',
            'descFilm' => 'nullable|string',
            'dateSortieFilm' => 'required|date',
            'dureeFilm' => 'required|integer',
            'posterFilm' => 'nullable|string',
            'idGenre' => 'required|exists:genres,idGenre',
        ]);

        $f = new Film();
        $f->titreFilm = request('titreFilm');
        $f->descFilm = request('descFilm');
        $f->dateSortieFilm = request('dateSortieFilm');
        $f->dureeFilm = request('dureeFilm');
        $f->posterFilm = request('posterFilm');
        $f->idGenre = request('idGenre');
        $f->save();

        return redirect()->route('films.index');
    }

    public function edit(Film $film) {
        return view('films.edit', compact('film'));
    }

    public function update(Film $film) {
        request()->validate([
            'titreFilm' => 'required|string|max:255',
            'descFilm' => 'nullable|string',
            'dateSortieFilm' => 'required|date',
            'dureeFilm' => 'required|integer',
            'posterFilm' => 'nullable|string',
            'idGenre' => 'required|exists:genres,idGenre',
        ]);

        $film->titreFilm = request('titreFilm');
        $film->descFilm = request('descFilm');
        $film->dateSortieFilm = request('dateSortieFilm');
        $film->dureeFilm = request('dureeFilm');
        $film->posterFilm = request('posterFilm');
        $film->idGenre = request('idGenre');
        $film->save();

        return redirect()->route('films.index');
    }

    public function destroy(Film $film) {
        $film->delete();
        return redirect()->route('films.index');
    }

}
