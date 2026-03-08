<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index(){
        $tarifs = Tarif::all();
        return view('tarifs.index', compact('tarifs'));
    }

    public function show(Tarif $tarif){
        return view('tarifs.show', compact('tarif'));
    }

    public function create() {
        return view('tarifs.create');
    }

    public function store(Request $request) {
        request()->validate([
            'libTarif' => 'required|string',
            'prixTarif' => 'required|numeric|max:999999.99',
        ]);

        $t = new Tarif();
        $t->libTarif = request('libTarif');
        $t->prixTarif = request('prixTarif');
        $t->save();

        return response()->json([
            'message' => 'tarif mis à jour !',
            'tarif' => $t
        ]);    }

    public function edit(Tarif $tarif){
        return view('tarifs.edit', compact('tarif'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'libTarif' => 'required|string',
            'prixTarif' => 'required|numeric|max:999999.99',
        ]);

        $tarif = Tarif::findOrFail($id);

        $tarif->update([
            'libTarif' => $request->libTarif,
            'prixTarif' => $request->prixTarif,
        ]);

        return response()->json([
            'message' => 'tarif mis à jour !',
            'tarif' => $tarif
        ]);
    }

    public function destroy($id)
    {
        $tarif = Tarif::findOrFail($id);
        $tarif->delete();

        return response()->json([
            'message' => 'Tarif supprimé avec succès !'
        ]);
    }

    public function editTarif(Request $request){
        $id = $request->idTarif;
        $tarif = Tarif::find($id);

        return response()->json([
            'tarif'=> $tarif,
        ]);
    }


}
