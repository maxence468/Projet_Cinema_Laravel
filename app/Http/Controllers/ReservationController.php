<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Http\Request;

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
        $date = date("Y-m-d");
        request()->validate([
            'idUser' => 'required|integer',
            'idSeance' => 'required|integer',
            'nbPlace' => 'required|numeric|min:1',
        'montantTotal' => 'required|numeric',
            ]);
        $r = new Reservation();
        $r->idUser = request('idUser');
        $r->idSeance = request('idSeance');
        $r->nbPlace = request('nbPlace');
        $r->dateReservation = $date;
        $r->montantTotal = request('montantTotal');
        $r->save();

        return redirect()->route('reservations.index');
    }

    public function edit(Reservation $reservation) {
        return view('reservations.edit',compact('reservation'));
    }

    public function update(Reservation $reservation){
        request()->validate([
            'idUser' => 'required|integer',
            'idSeance' => 'required|integer',
            'nbPlace' => 'required|integer|min:1',
            'montantTotal' => 'required|numeric|min:0',
        ]);

        $reservation->idUser = request('idUser');
        $reservation->idSeance = request('idSeance');
        $reservation->nbPlace = request('nbPlace');
        $reservation->montantTotal = request('montantTotal');
        $reservation->save();

        return redirect('/reservations/'.$reservation->idReservation);

    }


    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect('/reservations');
    }

}
