<?php
namespace App\Http\Controllers;

use App\Models\Actionnaire;
use Illuminate\Http\Request;

class ActionnaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nomActio'  => 'required|string|max:255',
            'preActio'  => 'required|string|max:255',
            'idCinema'  => 'nullable|exists:cinemas,idCinema',
            'argentInv' => 'nullable|numeric|min:0',
        ]);

        $actionnaire = new Actionnaire();
        $actionnaire->nomActio = $request->nomActio;
        $actionnaire->preActio = $request->preActio;
        $actionnaire->save();

        // Lier au cinéma si fourni
        if ($request->idCinema) {
            $actionnaire->investir()->sync([
                $request->idCinema => ['argentInv' => $request->argentInv ?? 0]
            ]);
        }

        return response()->json([
            'message'      => 'Actionnaire ajouté',
            'actionnaire'  => array_merge(
                $actionnaire->toArray(),
                [
                    'idCinema'  => $request->idCinema,
                    'argentInv' => $request->argentInv,
                ]
            ),
        ]);
    }

    public function update(Request $request, Actionnaire $actionnaire)
    {
        $request->validate([
            'nomActio'  => 'required|string|max:255',
            'preActio'  => 'required|string|max:255',
            'idCinema'  => 'nullable|exists:cinemas,idCinema',
            'argentInv' => 'nullable|numeric|min:0',
        ]);

        $actionnaire->nomActio = $request->nomActio;
        $actionnaire->preActio = $request->preActio;
        $actionnaire->save();

        // Mettre à jour la relation investir
        if ($request->idCinema) {
            $actionnaire->investir()->sync([
                $request->idCinema => ['argentInv' => $request->argentInv ?? 0]
            ]);
        } else {
            $actionnaire->investir()->detach();
        }

        return response()->json([
            'message'     => 'Actionnaire modifié',
            'actionnaire' => array_merge(
                $actionnaire->toArray(),
                [
                    'idCinema'  => $request->idCinema,
                    'argentInv' => $request->argentInv,
                ]
            ),
        ]);
    }

    public function destroy(Actionnaire $actionnaire)
    {
        $actionnaire->investir()->detach();
        $actionnaire->delete();

        return response()->json(['message' => 'Actionnaire supprimé']);
    }
}
