<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Salle;
use App\Models\Seance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller{
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

    public function progSemaineCinema(Request $request)
    {
        $cinemas = Cinema::all();
        $cinemaChoisi = collect();
        if ($request->has('cinema')) {
            $cinemaChoisi = Cinema::where('idCinema', $request->cinema)->get();
        }

        $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

        $premierJourSemaine = Carbon::now()->startOfWeek()->format('d');
        $jour = (int)$premierJourSemaine;

        $seances = collect();
        if ($request->has('jour')) {
            $date = new DateTime();
            $date->setDate(
                date('Y'),
                date('m'),
                $request->jour
            );

            $salles = $cinemaChoisi[0]->salles()->get();
            foreach ($salles as $salle) {
                $seances = $salle->seances()->where('dateSeance', $date->format('Y-m-d'))->orderBy('heureSeance')->get();
            }
        }


        return view('progSemaineCinema', compact('cinemas', 'cinemaChoisi', 'jour', 'joursSemaine', 'seances'));
    }
    public function accueil(){
        $dernierMercredi = new DateTime('last wednesday');

        if ((new DateTime())->format('N') == 3) {
            $dernierMercredi = new DateTime('today');
        }

        $dernierMercrediStr = $dernierMercredi->format('Y-m-d');

        $films = Film::all()->where('dateSortieFilm', $dernierMercrediStr)->take(3);
        $salles = Salle::all();
        $seances = Seance::all();
        $cinemas = Cinema::all();

        return view('pageAccueil',compact('films','salles','seances','cinemas'));
    }

    public function chercheFilm(Request $request){
        $request->validate([
            'search' => 'nullable|string|max:255'
        ]);

        $search = $request->input('search');

        $films = Film::when($search, function ($query) use ($search) {
            $query->where('titreFilm', 'LIKE', '%' . $search . '%');
        })->get();

        return view('recherchefilm', compact('films', 'search'));

    }
}
