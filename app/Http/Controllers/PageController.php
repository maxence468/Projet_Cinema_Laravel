<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Personne;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller{
    public function genre(Request $request)
    {
        $genres = Genre::all();
        $films = collect();
        $rechercheFaite = false;

        if ($request->filled('movie')) {
            $films = Film::where('idGenre', $request->movie)->get();
            $rechercheFaite = true;
        }

        return view('rechercheGenre', compact('genres', 'films', 'rechercheFaite'));
    }

    public function progSemaineCinema(Request $request)
    {
        Carbon::setLocale('fr');
        $cinemas = Cinema::all();
        $cinemaChoisi = collect();
        if ($request->has('cinema')) {
            $cinemaChoisi = Cinema::where('idCinema', $request->cinema)->get();
        }

        $joursSemaine = ['lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.', 'dim.'];

        $jours = [];

        $startOfWeek = Carbon::now()->startOfWeek(); // lundi par défaut
        $days = [];


        for ($i = 0; $i < 7; $i++) {
            $mois = $startOfWeek->copy()->addDays($i)->translatedFormat('F');
            $moisCourt = mb_substr($mois,0,3);
            $stringDate = $joursSemaine[$i] . " " . $startOfWeek->copy()->addDays($i)->translatedFormat('d') . " " . $moisCourt . "." ;
            $days[] = $stringDate;

            $jours[] = $startOfWeek->copy()->addDays($i)->translatedFormat('d');
        }

        $seances = collect();
        $films = collect();
        if ($request->has('jour')) {
            $date = new DateTime();
            $date->setDate(
                date('Y'),
                date('m'),
                $request->jour
            );

            $salles = $cinemaChoisi[0]->salles()->get();
            foreach ($salles as $salle) {
                $seances = $seances->merge($salle->seances()->where('dateSeance', $date->format('Y-m-d'))->orderBy('heureSeance')->get());
            }


            foreach($seances as $seance){
                $films->add($seance->film);
            }

            $films = $films->unique('idFilm');
        }


        return view('progSemaineCinema', compact('cinemas', 'cinemaChoisi', 'jours', 'joursSemaine', 'seances', 'films','mois', 'days'));
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

        return view('rechercheFilm', compact('films', 'search'));

    }

    public function rechercheActeur(Request $request){
        $request->validate([
            'searchActeur' => 'nullable|string|max:255'
        ]);

        $search = $request->input('searchActeur');

        $personnes = Personne::when($search, function ($query) use ($search) {
            $query->where('nomPers', 'LIKE', '%' . $search . '%');
        })->get();

        return view('rechercheActeur', compact('personnes', 'search'));
    }
}
