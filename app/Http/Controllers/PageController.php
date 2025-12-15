<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function accueil(){
        $films = Film::all()->take(3);

        return view('pageAccueil',compact('films'));
    }

    public function genre(Request $request){
        $genres = Genre::all();
        $films = collect();
        $rechercheFaite = false;

        if ($request->has('genre')) {
            $films = Film::where('idGenre', $request->genre)->get();
            $rechercheFaite = true;
        }

        return view('rechercheGenre', compact('genres', 'films', 'rechercheFaite'));
    }

    public function progSemaineCinema(Request $request){
        $cinemas = Cinema::all();
        $c = collect();
        if($request->has('cinema')){
            $c = Cinema::where('idCinema', $request->cinema)->get();
        }

        $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

        $premierJourSemaine = Carbon::now()->startOfWeek()->format('d');
        $jour = (int)$premierJourSemaine;

        $seances = collect();
        if($request->has('jour')){
            $date = new DateTime();
            $date->setDate(
                date('Y'),
                date('m'),
                $request->jour
            );

            $salles = $c[0]->salles()->get();
            foreach($salles as $salle){
                $seances = $salle->seances()->where('dateSeance', $date->format('Y-m-d'))->orderBy('heureSeance')->get();
            }
        }
        return view('progSemaineCinema', compact('cinemas','c', 'jour', 'joursSemaine', 'seances'));
    }
}
