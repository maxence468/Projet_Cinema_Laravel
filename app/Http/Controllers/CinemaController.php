<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index(){
        $cinemas = Cinema::all();
        return view('cinemas.index',compact('cinemas'));
    }


    public function show(Cinema $cinema){
        return view('cinemas.show',compact('cinema'));
    }

    public function create(){
        return view('cinemas.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nomCinema' => 'required',
            'adresseCinema' => 'required',
            'codePostale' => 'required',
        ]);

        $c = new Cinema;
        $c->nomCinema = $validated['nomCinema'];
        $c->adresseCinema = $validated['adresseCinema'];
        $c->codePostale = $validated['codePostale'];

        $c->save();

        return redirect('/cinemas/'.$c->idCinema);
    }
}
