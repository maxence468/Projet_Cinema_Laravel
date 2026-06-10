<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::all();
        return view('seances.index', compact('seances'));
    }

    public function show(Seance $seance)
    {
        return view('seances.show', compact('seance'));
    }

    public function create()
    {
        return view('seances.create');
    }

    /**
     * Vérifie si une séance chevauche des séances existantes dans la même salle.
     * Retourne la séance en conflit ou null.
     *
     * Logique : deux séances se chevauchent si
     *   heureDebut_existante < heureFin_nouvelle
     *   ET heureFin_existante > heureDebut_nouvelle
     *
     * @param string      $date       dateSeance (Y-m-d)
     * @param string      $heure      heureSeance (H:i)
     * @param int         $duree      dureeSeance en minutes
     * @param int         $idSalle
     * @param int|null    $ignoreId   idSeance à exclure (pour update)
     */
    private function findOverlap(string $date, string $heure, int $duree, int $idSalle, ?int $ignoreId = null): ?Seance
    {
        $debutNouvelle = Carbon::parse("$date $heure");
        $finNouvelle   = $debutNouvelle->copy()->addMinutes($duree);

        return Seance::where('idSalle', $idSalle)
            ->where('dateSeance', $date)
            ->when($ignoreId, fn($q) => $q->where('idSeance', '!=', $ignoreId))
            ->get()
            ->first(function (Seance $existing) use ($debutNouvelle, $finNouvelle) {
                $debutExistante = Carbon::parse("{$existing->dateSeance} {$existing->heureSeance}");
                $finExistante   = $debutExistante->copy()->addMinutes($existing->dureeSeance);

                return $debutExistante->lt($finNouvelle)
                    && $finExistante->gt($debutNouvelle);
            });
    }

    public function store(Request $request)
    {
        $request->validate([
            'heureSeance' => 'required|date_format:H:i',
            'dateSeance'  => 'required|date',
            'dureeSeance' => 'required|integer|min:1',
            'idFilm'      => 'required|exists:films,idFilm',
            'idSalle'     => 'required|exists:salles,idSalle',
        ]);

        $conflict = $this->findOverlap(
            $request->dateSeance,
            $request->heureSeance,
            (int) $request->dureeSeance,
            (int) $request->idSalle
        );

        if ($conflict) {
            return back()->withErrors([
                'heureSeance' => "Créneau indisponible"
            ])->withInput();
        }

        $s = new Seance();
        $s->heureSeance = $request->heureSeance;
        $s->dateSeance  = $request->dateSeance;
        $s->dureeSeance = $request->dureeSeance;
        $s->idFilm      = $request->idFilm;
        $s->idSalle     = $request->idSalle;
        $s->save();

        return redirect()->route('seances.index');
    }

    public function edit(Seance $seance)
    {
        return view('seances.edit', compact('seance'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heureSeance' => 'required|date_format:H:i',
            'dateSeance'  => 'required|date',
            'dureeSeance' => 'required|integer|min:1',
            'idFilm'      => 'required|exists:films,idFilm',
            'idSalle'     => 'required|exists:salles,idSalle',
        ]);

        $conflict = $this->findOverlap(
            $request->dateSeance,
            $request->heureSeance,
            (int) $request->dureeSeance,
            (int) $request->idSalle,
            (int) $id  // on exclut la séance courante
        );

        if ($conflict) {
            return response()->json([
                'message' => "Créneau indisponible : chevauchement avec la séance du {$conflict->dateSeance} à {$conflict->heureSeance} (durée {$conflict->dureeSeance} min).",
            ], 422);
        }

        $seance = Seance::findOrFail($id);

        $seance->update([
            'heureSeance' => $request->heureSeance,
            'dateSeance'  => $request->dateSeance,
            'dureeSeance' => $request->dureeSeance,
            'idFilm'      => $request->idFilm,
            'idSalle'     => $request->idSalle,
        ]);

        return response()->json([
            'message' => 'Seance mis à jour !',
            'seance'  => $seance
        ]);
    }

    public function destroy($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->delete();

        return response()->json([
            'message' => 'Seance supprimée avec succès !'
        ]);
    }

    public function editSeance(Request $request)
    {
        $id     = $request->idSeance;
        $seance = Seance::find($id);

        return response()->json([
            'seance' => $seance,
        ]);
    }
}
