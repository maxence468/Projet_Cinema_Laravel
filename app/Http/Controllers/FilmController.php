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

    public function create(){
        return view('films.create');
    }

    public function show(Film $film){
        return view('films.show', compact('film'));
    }

    public function store(Request $request) {
        $request->validate([
            'titreFilm' => 'required|string|max:255',
            'descFilm' => 'nullable|string',
            'dateSortieFilm' => 'required|date',
            'dureeFilm' => 'required|integer',
            'posterFilm' => 'required|string|max:255',
            'idGenre' => 'required|exists:genres,idGenre',
        ]);

        //film
        $f = new Film();
        $f->titreFilm = $request->titreFilm;
        $f->descFilm = $request->descFilm;
        $f->dateSortieFilm = $request->dateSortieFilm;
        $f->dureeFilm = $request->dureeFilm;
        $f->posterFilm = $request->posterFilm;
        $f->idGenre = $request->idGenre;

        $f->save();

        //realisateur
        $f->realisateurs()->sync($request->idRealisateurs ?? []);
        //scenariste
        $f->scenariste()->sync($request->idScenaristes ?? []);
        //acteur
        $data = [];
        foreach ($request->idActeurs ?? [] as $i => $id) {
            if (!$id) continue;
            $data[$id] = [
                'nomJoue' => ($request->nomJoue)[$i] ?? null,
                'preJoue' => ($request->preJoue)[$i] ?? null,
                'principale' => ($request->principale)[$i] ?? null,
                'secondaire' => ($request->secondaire)[$i] ?? null,
            ];
        }
        $f->casting()->sync($data);

        return response()->json(['message' => 'Film ajouté', 'film' => $f]);
    }

    public function editFilm(Request $request){
        $id = $request->idFilm;
        $film = Film::find($id);
        $realisateurs = $film->realisateurs;
        $scenaristes = $film->scenariste;
        $acteurs = $film->casting;


        return response()->json([
            'film'=> $film,
            'realisateurs' => $realisateurs,
            'scenaristes' => $scenaristes,
            'acteurs' => $acteurs,
        ]);
    }

    public function edit(Film $film) {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titreFilm' => 'required|string|max:255',
            'descFilm' => 'nullable|string',
            'dateSortieFilm' => 'required|date',
            'dureeFilm' => 'required|integer',
            'posterFilm' => 'nullable|string|max:255',
            'idGenre' => 'required|exists:genres,idGenre',
        ]);

        $film = Film::findOrFail($id);

        $film->update([
            'titreFilm' => $request->titreFilm,
            'descFilm' => $request->descFilm,
            'dateSortieFilm' => $request->dateSortieFilm,
            'dureeFilm' => $request->dureeFilm,
            'posterFilm' => $request->posterFilm ?? $film->posterFilm,
            'idGenre' => $request->idGenre,
        ]);
        //realisateur
        $film->realisateurs()->sync($request->idRealisateurs ?? []);
        //scenariste
        $film->scenariste()->sync($request->idScenaristes ?? []);
        //acteur
        $data = [];
        foreach ($request->idActeurs ?? [] as $i => $idActeur) {
            if (!$idActeur) continue;
            $data[$idActeur] = [
                'nomJoue' => ($request->nomJoue)[$i] ?? null,
                'preJoue' => ($request->preJoue)[$i] ?? null,
                'principale' => ($request->principale)[$i] ?? null,
                'secondaire' => ($request->secondaire)[$i] ?? null,
            ];
        }
        $film->casting()->sync($data);

        return response()->json([
            'message' => 'Film mis à jour !',
            'film' => $film,
        ]);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);

        $film->realisateurs()->detach();
        $film->scenariste()->detach();
        $film->casting()->detach();

        $film->delete();

        return response()->json([
            'message' => 'Film supprimé avec succès !'
        ]);
    }


}
