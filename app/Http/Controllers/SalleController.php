<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Salle;
use App\Models\TypeSalle;
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
            'idTarif' => 'required',
            'numeroSalle' => 'required|integer'
        ]);

        $s = new Salle();
        $s->capaciteSal = request('capaciteSal');
        $s->idTypeSalle = request('idTypeSalle');
        $s->idCinema = request('idCinema');
        $s->numeroSalle = request('numeroSalle');
        $s->save();

        $s->tarifs()->sync(request('idTarif'));

        return redirect()->route('salles.index');
    }

    public function edit(Salle $salle) {
        return view('salles.edit', compact('salle'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([
            'capaciteSal' => 'required|integer',
            'idTypeSalle' => 'required|exists:typesalles,idTypeSalle',
            'idCinema' => 'required|exists:cinemas,idCinema',
            'idTarif' => 'required',
            'numeroSalle' => 'required|integer'

        ]);

        $salle = Salle::findOrFail($id);

        $salle->update([
            'capaciteSal' => $request->capaciteSal,
            'idTypeSalle' => $request->idTypeSalle,
            'idCinema' => $request->idCinema,
            'numeroSalle' => $request->numeroSalle
            ]);

        $salle->tarifs()->sync(request('idTarif'));


        return response()->json([
            'message' => 'Salle mis à jour !',
            'salle' => $salle
        ]);
    }

    public function destroy($id)
    {
        $salle = Salle::findOrFail($id);

        $salle->tarifs()->detach();

        $salle->delete();

        return response()->json([
            'message' => 'Salle supprimée avec succès !'
        ]);
    }
    public function editSalle(Request $request){
        $id = $request->idSalle;
        $salle = Salle::with('tarifs')->find($id);

        return response()->json([
            'salle'=> $salle,
        ]);
    }
}
