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
            'prixTypeSalle' => 'required|numeric|max:999999.99'
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

    public function update(Request $request, $id)
    {
        request()->validate([
            'libTypeSalle' => 'required|string',
            'prixTypeSalle' => 'required|numeric'
        ]);

        $typeSalle = TypeSalle::findOrFail($id);

        $typeSalle->update([
            'libTypeSalle' => $request->libTypeSalle,
            'prixTypeSalle' => $request->prixTypeSalle,
        ]);

        return response()->json([
            'message' => 'type salle mis à jour !',
            'typeSalle' => $typeSalle
        ]);
    }

    public function destroy($id)
    {
        $typeSalle = TypeSalle::findOrFail($id);
        $typeSalle->delete();

        return response()->json([
            'message' => 'Type salle supprimé avec succès !'
        ]);
    }

    public function edittypesalles(Request $request){
        $id = $request->idTypeSalle;
        $typeSalle = TypeSalle::find($id);

        return response()->json([
            'typeSalle'=> $typeSalle,
        ]);
    }
}
