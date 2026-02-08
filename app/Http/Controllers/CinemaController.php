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

    public function create() {
        return view('cinemas.create');
    }

    public function show(Cinema $cinema){
        return view('cinemas.show',compact('cinema'));
    }

    public function store() {
        request()->validate([
            'nomCinema' => 'required|string',
            'adresseCinema' => 'required|string',
            'codePostale' => 'required|string',
        ]);

        $c = new Cinema();
        $c->nomCinema = request('nomCinema');
        $c->adresseCinema = request('adresseCinema');
        $c->codePostale = request('codePostale');
        $c->save();

        return redirect()->route('cinemas.index');
    }

    public function edit(Cinema $cinema) {
        return view('cinemas.edit', compact('cinema'));
    }

    public function update(Cinema $cinema) {
        request()->validate([
            'nomCinema' => 'required|string',
            'adresseCinema' => 'required|string',
            'codePostale' => 'required|string',
        ]);

        $cinema->nomCinema = request('nomCinema');
        $cinema->adresseCinema = request('adresseCinema');
        $cinema->codePostale = request('codePostale');
        $cinema->save();

        return redirect()->route('cinemas.index');
    }

    public function destroy(Cinema $cinema) {
        $cinema->delete();
        return redirect()->route('cinemas.index');
    }
}
