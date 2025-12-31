<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
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

    public function create(){
        $salles = Salle::all();
        $films = Film::all();
        return view('seances.create',compact('salles','films'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'dateSeance' => 'required',
            'heureSeance' => 'required',
            'idSalle' => 'required',
            'idFilm' => 'required',
            'dureeSeance' => 'required',
        ]);

        $s = new Seance();
        $s->dateSeance = $validated['dateSeance'];
        $s->heureSeance = $validated['heureSeance'];
        $s->idSalle = $validated['idSalle'];
        $s->idFilm = $validated['idFilm'];
        $s->dureeSeance = $validated['dureeSeance'];
        $s->save();

        return redirect('/seances/'.$s->idSeance);

    }

    public function edit(Seance $seance){
        $salles = Salle::all();
        $films = Film::all();
        return view('seances.edit', compact('seance','salles','films'));
    }

    public function update(Request $request, Seance $seance){
        $date = $request->only(['dateSeance','heureSeance','idSalle','idFilm','dureeSeance']);
        $seance->update(array_filter($date));
        return redirect('/seances'.$seance->idSeance);
    }

    public function destroy(Seance $seance){
        $seance->delete();
        return redirect('/seances');
    }
}
