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

        return response()->json([
           'titreFilm'=> request('titreFilm'),
        ]);
    }

    public function editFilm(Request $request){
        $id = $request->idFilm;
        $film = Film::find($id);

        return response()->json([
            'film'=> $film,
        ]);
    }

    public function edit(Film $film) {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $film->update([
            'titreFilm' => $request->titreFilm,
            'descFilm' => $request->descFilm,
            'dateSortieFilm' => $request->dateSortieFilm,
            'dureeFilm' => $request->dureeFilm,
            'posterFilm' => $request->posterFilm,
            'idGenre' => $request->idGenre,
        ]);

        return response()->json([
            'message' => 'Film mis à jour !',
            'film' => $film
        ]);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return response()->json([
            'message' => 'Film supprimé avec succès !'
        ]);
    }


}
