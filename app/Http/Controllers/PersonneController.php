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
        $request->validate([
            'nomPers' => 'required|string',
            'prePers' => 'required|string',
            'dateNaissPers' => 'required|date',
            'lieuNaissPers' => 'required|string',
            'photoPers' => 'required|string',
            'biblio' => 'required|string',
        ]);

        $p = new Personne();
        $p->nomPers = $request->nomPers;
        $p->prePers = $request->prePers;
        $p->dateNaissPers = $request->dateNaissPers;
        $p->lieuNaissPers = $request->lieuNaissPers;
        $p->photoPers = $request->photoPers;
        $p->biblio = $request->biblio;
        $p->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['message' => 'Personne créée avec succès !', 'personne' => $p]);
        }
        return redirect()->route('personnes.index');
    }

    public function edit(Personne $personne) {
        return view('personnes.edit', compact('personne'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([

        ]);

        $personne = Personne::findOrFail($id);

        $personne->update([
            'nomPers' => $request->nomPers,
            'prePers' => $request->prePers,
            'dateNaissPers' => $request->dateNaissPers,
            'lieuNaissPers' => $request->lieuNaissPers,
            'photoPers' => $request->photoPers,
            'biblio' => $request->biblio,
        ]);

        return response()->json([
            'message' => 'Personne mise à jour !',
            'personne' => $personne
        ]);
    }
    public function destroy($id)
    {
        $personne = Personne::findOrFail($id);
        $personne->delete();

        return response()->json([
            'message' => 'Personne supprimé avec succès !'
        ]);
    }

    public function editPersonne(Request $request){
        $id = $request->idPers;
        $personne = Personne::find($id);

        return response()->json([
            'personne'=> $personne,
        ]);
    }
}
