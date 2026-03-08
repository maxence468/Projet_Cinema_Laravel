<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index(){
        $cinemas = Cinema::all();
        return view('cinemas.index',compact('cinemas'));
    }

    public function create() {
        return view('cinemas.create');
    }

    public function show(Cinema $cinema){
        return view('cinemas.show',compact('cinema'));
    }

    public function store() {
        request()->validate([
            'nomCinema' => 'required|string',
            'adresseCinema' => 'required|string',
            'codePostale' => 'required|string',
        ]);

        $c = new Cinema();
        $c->nomCinema = request('nomCinema');
        $c->adresseCinema = request('adresseCinema');
        $c->codePostale = request('codePostale');
        $c->save();

        return redirect()->route('cinemas.index');
    }

    public function edit(Cinema $cinema) {
        return view('cinemas.edit', compact('cinema'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([

        ]);

        $cinema = Cinema::findOrFail($id);

        $cinema->update([
            'nomCinema' => $request->nomCinema,
            'adresseCinema' => $request->adresseCinema,
            'codePostale' => $request->codePostale,
        ]);

        return response()->json([
            'message' => 'Cinema mis à jour !',
            'cinema' => $cinema
        ]);

        return redirect()->route('cinemas.index');
    }

    public function destroy($id)
    {
        $cinema = Cinema::findOrFail($id);
        $cinema->delete();

        return response()->json([
            'message' => 'Cinema supprimé avec succès !'
        ]);
    }

    public function editCinema(Request $request){
        $id = $request->idCinema;
        $cinema = Cinema::find($id);

        return response()->json([
            'cinema'=> $cinema,
        ]);
    }
}
