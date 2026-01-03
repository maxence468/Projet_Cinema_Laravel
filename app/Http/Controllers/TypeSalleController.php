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

    public function create() {
        return view('typesalles.create');
    }

    public function store(Request $request) {
        request()->validate([
            'libTypeSalle' => 'required|string',
            'prixTypeSalle' => 'required|numeric'
        ]);

        $t = new TypeSalle();
        $t->libTypeSalle = request('libTypeSalle');
        $t->prixTypeSalle = request('prixTypeSalle');
        $t->save();

        return redirect()->route('typesalles.index');
    }

    public function edit(TypeSalle $typeSalle){
        return view('typesalles.edit', compact('typeSalle'));
    }

    public function update(Request $request, TypeSalle $typeSalle){
        request()->validate([
            'libTypeSalle' => 'required|string',
            'prixTypeSalle' => 'required|numeric'
        ]);

        $typeSalle->libTypeSalle = request('libTypeSalle');
        $typeSalle->prixTypeSalle = request('prixTypeSalle');
        $typeSalle->save();

        return redirect()->route('typesalles.index');
    }

    public function destroy(TypeSalle $typeSalle){
        $typeSalle->delete();
        return redirect()->route('typesalles.index');
    }
}
