<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Salle;
use App\Models\TypeSalle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index(){
        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }
    public function show(Salle $salle){
        return view('salles.show', compact('salle'));
    }

    public function create(){
        $typesSalle = TypeSalle::all();
        $cinemas = Cinema::all();
        return view('salles.create', compact('cinemas','typesSalle'));
    }

    public function store(Request $request){
        $vali = request()->validate([
            'capaciteSal' => 'required',
            'idCinema' => 'required',
            'idTypeSalle' => 'required',
        ]);

        $s = new Salle();
        $s->capaciteSal = $vali['capaciteSal'];
        $s->idCinema = $vali['idCinema'];
        $s->idTypeSalle = $vali['idTypeSalle'];

        $s->save();

        return redirect('/salles/'.$s->idSalle);

    }
}
