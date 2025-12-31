<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index(){
        $tarifs = Tarif::all();
        return view('tarifs.index',compact('tarifs'));
    }
    public function show(Tarif $tarif){
        return view('tarifs.show',compact('tarif'));
    }

    public function create(){
        return view('tarifs.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'libTarif' => 'required',
            'prixTarif' => 'required',
        ]);

        $t = new Tarif();
        $t->libTarif = $validated['libTarif'];
        $t->prixTarif = $validated['prixTarif'];

        $t->save();
        return redirect('/tarifs/'.$t->idTarif);

    }
}
