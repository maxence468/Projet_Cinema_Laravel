<?php

namespace App\Http\Controllers;

use App\Models\TypeSalle;
use Illuminate\Http\Request;

class TypeSalleController extends Controller
{
    public function index(){
        $typesalles = TypeSalle::all();
        return view('typesalles.index', compact('typesalles'));
    }
    public function show(TypeSalle $typesalle){
        return view('typesalles.show', compact('typesalle'));
    }

    public function create(){
        return view('typesalles.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'libTypeSalle' => 'required',
            'prixTypeSalle' => 'required',

        ]);

        $t = new TypeSalle();
        $t->libTypeSalle = $validated['libTypeSalle'];
        $t->prixTypeSalle = $validated['prixTypeSalle'];
        $t->save();
        return redirect('/typesalles/'.$t->idTypeSalle);
    }

    public function edit(TypeSalle $typesalle){
        return view('typesalles.edit', compact('typesalle'));
    }

    public function update(Request $request, TypeSalle $typesalle){
        $validated = $request->validate([
            'libTypeSalle' => 'sometimes|required',
            'prixTypeSalle' => 'sometimes|required|numeric',
        ]);

        $typesalle->update($validated);

        return redirect('/typesalles/'.$typesalle->idTypeSalle);
    }


public function destroy(TypeSalle $typesalle){
        $typesalle->delete();
        return redirect('/typesalles');
}
}
