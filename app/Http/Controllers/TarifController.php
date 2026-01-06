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
            'prixTarif' => 'required|numeric',
        ]);

        $t = new Tarif();
        $t->libTarif = request('libTarif');
        $t->prixTarif = request('prixTarif');
        $t->save();

        return redirect()->route('tarifs.index');
    }

    public function edit(Tarif $tarif){
        return view('tarifs.edit', compact('tarif'));
    }

    public function update(Request $request, Tarif $tarif){
        request()->validate([
            'libTarif' => 'required|string',
            'prixTarif' => 'required|numeric',
        ]);

        $tarif->libTarif = request('libTarif');
        $tarif->prixTarif = request('prixTarif');
        $tarif->save();

        return redirect()->route('tarifs.index');
    }

    public function destroy(Tarif $tarif){
        $tarif->delete();
        return redirect()->route('tarifs.index');
    }
}
