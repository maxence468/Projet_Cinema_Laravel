<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{

    public function index(){
        $reservations = Reservation::all();
        return view('reservations.index',compact('reservations'));
    }

    public function show(Reservation $reservation){
        return view('reservations.show',compact('reservation'));
    }


    public function create() {
        return view('reservations.create');
    }

    public function store(Request $request) {
        $tableauPrix = $request->input('tarifs'); // tableau de prix
        $nbPlace = 0;
        $prixTotal = 0;
        foreach($tableauPrix as $p){
            $prixTotal += $p;
            $nbPlace++;
        }
        $idUser = auth()->id();

        $date = date("Y-m-d");
        request()->validate([
            'idSeance' => 'required|integer',
        ]);

        $seance = Seance::with('salle')->find(request('idSeance'));
        $salle = $seance->salle;
        $reservations = Reservation::where('idSeance', request('idSeance'))->get();
        $placeRestante = $salle->capaciteSal;
        foreach($reservations as $res){
            $placeRestante -= $res->nbPlace;
        }
        if($placeRestante <= 0){
            return redirect()->route('mesReservations')->with('error', 'La séance est complete, vous ne pouvez plus effectuer la réservation.');;
        }
        if(Carbon::parse($seance->dateSeance)->lt(Carbon::today())){
            return redirect()->route('mesReservations')->with('error', 'La séance est déjà passée, vous ne pouvez plus effectuer la réservation.');
        }

        $r = new Reservation();
        $r->idUser = $idUser;
        $r->idSeance = request('idSeance');
        $r->nbPlace = $nbPlace;
        $r->dateReservation = $date;
        $r->montantTotal = $prixTotal;
        $r->save();

        return redirect()->route('mesReservations');
    }

    public function edit(Reservation $reservation) {
        $idSeance = $reservation->idSeance;
        $seance = Seance::find($idSeance);

        $capaciteTot = $seance->salle->capaciteSal;
        $placeReserve = Reservation::where('idSeance', $idSeance)->sum('nbPlace');
        $placeRestant = $capaciteTot - $placeReserve;

        $date = date("Y-m-d");

        $tarifs = Tarif::all();

        $now = Carbon::now();
        if(Carbon::parse($seance->dateSeance)->lt(Carbon::today())){
            return redirect()->route('mesReservations')->with('error', 'La séance est déjà passée, vous ne pouvez plus modifier la réservation.');
        }

        return view('modifierReservation',compact('reservation', 'seance', 'placeRestant', 'tarifs'));
    }

    public function update(Request $request, Reservation $reservation){
        $tableauPrix = $request->input('tarifs'); // tableau de prix
        $nbPlace = 0;
        $prixTotal = 0;
        foreach($tableauPrix as $p){
            $prixTotal += $p;
            $nbPlace++;
        }
        $idUser = auth()->id();

        $date = date("Y-m-d");
        request()->validate([
            'idSeance' => 'required|integer',
        ]);

        $seance = Seance::with('salle')->find(request('idSeance'));
        $salle = $seance->salle;
        $reservations = Reservation::where('idSeance', request('idSeance'))->get();
        $placeRestante = $salle->capaciteSal;
        foreach($reservations as $res){
            $placeRestante -= $res->nbPlace;
        }
        $placeRestante += $reservation->nbPlace;
        if($placeRestante <= 0){
            return redirect()->route('mesReservations')->with('error', 'La séance est complete, vous ne pouvez plus effectuer la réservation.');;
        }
        if(Carbon::parse($seance->dateSeance)->lt(Carbon::today())){
            return redirect()->route('mesReservations')->with('error', 'La séance est déjà passée, vous ne pouvez plus modifier la réservation.');
        }

        $reservation->idUser = $idUser;
        $reservation->idSeance = request('idSeance');
        $reservation->nbPlace = $nbPlace;
        $reservation->montantTotal = $prixTotal;
        $reservation->save();

        return redirect('/mesReservations');
    }


    public function destroy(Reservation $reservation) {
        $seance = Seance::find($reservation->idSeance);
        if(Carbon::parse($seance->dateSeance)->lt(Carbon::today())){
            return redirect()->route('mesReservations')->with('error', 'La séance est déjà passée, vous ne pouvez plus supprimer la réservation.');
        }
        $reservation->delete();
        return redirect('/mesReservations');
    }

}
