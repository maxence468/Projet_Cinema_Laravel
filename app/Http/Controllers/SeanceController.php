<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::all();
        return view('seances.index', compact('seances'));
    }

    public function show(Seance $seance)
    {
        return view('seances.show', compact('seance'));
    }

    public function create()
    {
        return view('seances.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'heureSeance' => 'required|date_format:H:i',
            'dateSeance' => 'required|date',
            'dureeSeance' => 'required|integer',
            'idFilm' => 'required|exists:films,idFilm',
            'idSalle' => 'required|exists:salles,idSalle',
        ]);

        $s = new Seance();
        $s->heureSeance = request('heureSeance');
        $s->dateSeance = request('dateSeance');
        $s->dureeSeance = request('dureeSeance');
        $s->idFilm = request('idFilm');
        $s->idSalle = request('idSalle');
        $s->save();

        return redirect()->route('seances.index');
    }

    public function edit(Seance $seance)
    {
        return view('seances.edit', compact('seance'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'heureSeance' => 'required|date_format:H:i',
            'dateSeance' => 'required|date',
            'dureeSeance' => 'required|integer',
            'idFilm' => 'required|exists:films,idFilm',
            'idSalle' => 'required|exists:salles,idSalle',
        ]);

        $seance = Seance::findOrFail($id);

        $seance->update([
            'heureSeance' => $request->heureSeance,
            'dateSeance' => $request->dateSeance,
            'dureeSeance' => $request->dureeSeance,
            'idFilm' => $request->idFilm,
            'idSalle' => $request->idSalle,
        ]);

        return response()->json([
            'message' => 'Seance mis à jour !',
            'seance' => $seance
        ]);
    }

    public function destroy($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->delete();

        return response()->json([
            'message' => 'Seance supprimée avec succès !'
        ]);
    }

    public function editSeance(Request $request)
    {
        $id = $request->idSeance;
        $seance = Seance::find($id);

        return response()->json([
            'seance' => $seance,
        ]);
    }
}
