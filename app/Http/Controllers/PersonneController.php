<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    public function index(){
        $personnes = Personne::all();
        return view('personnes.index',compact('personnes'));
    }

    public function show(Personne $personne){
        return view('personnes.show',compact('personne'));
    }

    public function create() {
        return view('personnes.create');
    }

    public function store(Request $request) {
        request()->validate([
            'nomPers' => 'required|string',
            'prePers' => 'required|string',
            'dateNaissPers' => 'required|date',
            'lieuNaissPers' => 'required|string',
            'photoPers' => 'required|string',
            'biblio' => 'required|string',
        ]);

        $p = new Personne();
        $p->nomPers = request('nomPers');
        $p->prePers = request('prePers');
        $p->dateNaissPers = request('dateNaissPers');
        $p->lieuNaissPers = request('lieuNaissPers');
        $p->photoPers = request('photoPers');
        $p->biblio = request('biblio');
        $p->save();

        return redirect()->route('personnes.index');
    }

    public function edit(Personne $personne) {
        return view('personnes.edit', compact('personne'));
    }

    public function update(Request $request, Personne $personne) {
        request()->validate([
            'nomPers' => 'required|string',
            'prePers' => 'required|string',
            'dateNaissPers' => 'required|date',
            'lieuNaissPers' => 'required|string',
            'photoPers' => 'required|string',
            'biblio' => 'required|string',
        ]);

        $personne->nomPers = request('nomPers');
        $personne->prePers = request('prePers');
        $personne->dateNaissPers = request('dateNaissPers');
        $personne->lieuNaissPers = request('lieuNaissPers');
        $personne->photoPers = request('photoPers');
        $personne->biblio = request('biblio');
        $personne->save();

        return redirect()->route('personnes.index');
    }

    public function destroy(Personne $personne) {
        $personne->delete();
        return redirect()->route('personnes.index');
    }
}
