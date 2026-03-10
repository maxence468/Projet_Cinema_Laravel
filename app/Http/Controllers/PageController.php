<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Personne;
use App\Models\Tarif;
use App\Models\TypeSalle;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

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

    public function inscription() {
        return view('inscription');
    }

    public function connexion() {
        return view('connexion');
    }

    public function gestionCatalogue() {
        return view('gestionFilm');
    }

    public function gestionFilm() {
        $genres = Genre::all();
        $films = Film::all();
        $personnes = Personne::all();

        return view('gestionFilm', [
            'genres' => $genres,
            'films' => $films,
            'personnes' => $personnes

        ]);
    }

    public function gestionGenre() {
        $genres = Genre::all();
        return view('gestionGenre', [
            'genres' => $genres
        ]);
    }
    public function gestionPersonne() {
        $personnes = Personne::all();
        return view('gestionPersonne', [
            'personnes' => $personnes
        ]);
    }

    public function gestionCasting() {
        $films = Film::all();
        $personnes = Personne::all();
        return view('gestionCasting', [
            'films' => $films,
            'personnes' => $personnes
        ]);
    }

    public function gestionCinema() {
        $cinemas = Cinema::all();
        $genres = Genre::all();
        return view('gestionCinema', [
            'cinemas' => $cinemas,
            'genres' => $genres
        ]);
    }

    public function gestionSalle() {
        $cinemas = Cinema::all();
        $typeSalles = TypeSalle::all();
        $tarifs = Tarif::all();
        $salles = Salle::all();
        return view('gestionSalle', [
            'cinemas' => $cinemas,
            'typeSalles' => $typeSalles,
            'tarifs' => $tarifs,
            'salles' => $salles,
        ]);
    }

    public function gestionSeance() {
        $films = Film::all();
        $salles = Salle::all();
        $seances = Seance::all();

        return view('gestionSeance', [
            'films' => $films,
            'salles' => $salles,
            'seances' => $seances,
        ]);
    }

    public function gestionTarif() {
        $tarifs = Tarif::all();

        return view('gestionTarif', [
            'tarifs' => $tarifs,
        ]);
    }

    public function gestionTypeSalle() {
        $typeSalles = TypeSalle::all();

        return view('gestionTypeSalle', [
            'typeSalles' => $typeSalles,
        ]);
    }

    public function gestionTarifSalle() {
        return view('gestionTarifSalle');
    }

    public function parametresUtilisateur() {
        return view('parametresUtilisateur');
    }

    public function mesReservations(Request $request) {
        $idUser = auth()->id();
        $filter = $request->input('filter', 'toutes');
        $query = Reservation::with('seance.film', 'seance.salle.cinema')->where('idUser', $idUser);

        $now = Carbon::now();
        switch ($filter) {
            case 'a_venir':
                $query->whereHas('seance', fn($q) => $q->where('dateSeance', '>', $now));
                break;
            case 'en_cours':
                $query->whereHas('seance', fn($q) => $q->where('dateSeance', '=', $now->toDateString()));
                break;
            case 'passees':
                $query->whereHas('seance', fn($q) => $q->where('dateSeance', '<', $now));
                break;
            case 'toutes':
            default:
                break;
        }
        $reservations = $query->get();

        return view('reservation', compact('reservations', 'filter'));
    }

    public function effectuerReservation($idSeance) {
        $seance = Seance::find($idSeance);

        $capaciteTot = $seance->salle->capaciteSal;
        $placeReserve = Reservation::where('idSeance', $idSeance)->sum('nbPlace');
        $placeRestant = $capaciteTot - $placeReserve;

        $tarifs = Tarif::all();

        return view('effectuerReservation', compact(
            'seance',
            'placeRestant',
            'tarifs',
        ));
    }

    public function modifierReservation($idSeance) {
        $seance = Seance::find($idSeance);

        $capaciteTot = $seance->salle->capaciteSal;
        $placeReserve = Reservation::where('idSeance', $idSeance)->sum('nbPlace');
        $placeRestant = $capaciteTot - $placeReserve;

        $tarifs = Tarif::all();

        return view('modifierReservation', compact(
            'seance',
            'placeRestant',
            'tarifs',
        ));
    }
}
