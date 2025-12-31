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

    public function edit(Cinema $cinema){
        return view('cinemas.edit',compact('cinema'));
    }

    public function update(Request $request, Cinema $cinema){
        $data = $request->only([
            'nomCinema',
            'adresseCinema',
            'codePostale',
        ]);

        $cinema->update(array_filter($data));

        return redirect('/cinemas/' . $cinema->idCinema);
    }

    public function destroy(Cinema $cinema){
        $cinema->delete();
        return redirect('/cinemas');
    }
}
