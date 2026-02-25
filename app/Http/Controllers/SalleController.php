<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index(){
        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }
    public function show(Salle $salle){
        return view('salles.show', compact('salle'));
    }

    public function create() {
        return view('salles.create');
    }

    public function store(Request $request) {
        request()->validate([
            'capaciteSal' => 'required|integer',
            'idTypeSalle' => 'required|exists:typesalles,idTypeSalle',
            'idCinema' => 'required|exists:cinemas,idCinema',
        ]);

        $s = new Salle();
        $s->capaciteSal = request('capaciteSal');
        $s->idTypeSalle = request('idTypeSalle');
        $s->idCinema = request('idCinema');
        $s->save();

        return redirect()->route('salles.index');
    }

    public function edit(Salle $salle) {
        return view('salles.edit', compact('salle'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([

        ]);

        $salle = Salle::findOrFail($id);

        $salle->update([
            'capaciteSal' => $request->capaciteSal,
            'idTypeSalle' => $request->idTypeSalle,
            'idCinema' => $request->idCinema,
        ]);

        return response()->json([
            'message' => 'Salle mis à jour !',
            'salle' => $salle
        ]);
    }

    public function destroy($id)
    {
        $salle = Salle::findOrFail($id);
        $salle->delete();

        return response()->json([
            'message' => 'Salle supprimée avec succès !'
        ]);
    }
    public function editSalle(Request $request){
        $id = $request->idSalle;
        $salle = Salle::find($id);

        return response()->json([
            'salle'=> $salle,
        ]);
    }
}
