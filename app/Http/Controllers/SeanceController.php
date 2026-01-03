<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index(){
        $seances = Seance::all();
        return view('seances.index', compact('seances'));
    }
    public function show(Seance $seance){
        return view('seances.show', compact('seance'));
    }

    public function create() {
        return view('seances.create');
    }

    public function store(Request $request) {
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

    public function edit(Seance $seance){
        return view('seances.edit', compact('seance'));
    }

    public function update(Request $request, Seance $seance){
        request()->validate([
            'heureSeance' => 'required|date_format:H:i',
            'dateSeance' => 'required|date',
            'dureeSeance' => 'required|integer',
            'idFilm' => 'required|exists:films,idFilm',
            'idSalle' => 'required|exists:salles,idSalle',
        ]);

        $seance->heureSeance = request('heureSeance');
        $seance->dateSeance = request('dateSeance');
        $seance->dureeSeance = request('dureeSeance');
        $seance->idFilm = request('idFilm');
        $seance->idSalle = request('idSalle');
        $seance->save();

        return redirect()->route('seances.index');
    }

    public function destroy(Seance $seance){
        $seance->delete();
        return redirect()->route('seances.index');
    }
}
