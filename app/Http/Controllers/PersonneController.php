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

    public function create(){
        return view('personnes.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nomPers' => 'required',
            'prePers' => 'required',
            'dateNaissPers' => 'required',
            'lieuNaissPers' => 'required',
            'photoPers' => 'required',
            'biblio' => 'required',
        ]);

        $photoPath = $request->file('photoPers')->store('photo', 'public');

        $p = new Personne();
        $p->nomPers = $validated['nomPers'];
        $p->prePers = $validated['prePers'];
        $p->dateNaissPers = $validated['dateNaissPers'];
        $p->LieuNaissPers = $validated['lieuNaissPers'];
        $p->photoPers = $photoPath;
        $p->biblio = $validated['biblio'];

        $p->save();

        return redirect('/personnes/'.$p->idPers);
    }

    public function edit(Personne $personne){
        return view('personnes.edit',compact('personne'));
    }

    public function update(Request $request,Personne $personne){

        request()->validate([
            'nomPers',
            'prePers',
            'dateNaissPers',
            'lieuNaissPers',
            'photoPers',
            'biblio',
        ]);

        $photoPath = $request->file('photoPers')->store('photo', 'public');

        $personne->nomPers = request('nomPers');
        $personne->prePers = request('prePers');
        $personne->dateNaissPers = request('dateNaissPers');
        $personne->lieuNaissPers = request('lieuNaissPers');
        $personne->photoPers = $photoPath;
        $personne->biblio = request('biblio');

        $personne->save();


        return redirect('/personnes/' . $personne->idPers);



    }

    public function destroy(Personne $personne){
        $personne->delete();
        return redirect('/personnes');
    }
}
