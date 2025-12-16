<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Personne;
use App\Models\Salle;
use App\Models\Seance;
use DateTime;
use Illuminate\Http\Request;

class PageController extends Controller
{
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


    public function rechercheGenre(){
        $genres = Genre::all();
        return view('rechGenre',compact('genres'));
    }


    public function rechercheActeur(Request $request){
        $request->validate([
            'searchActeur' => 'nullable|string|max:255'
        ]);

        $search = $request->input('searchActeur');

        $personnes = Personne::when($search, function ($query) use ($search) {
            $query->where('nomPers', 'LIKE', '%' . $search . '%');
        })->get();

        return view('rechActeur', compact('personnes', 'search'));
    }


}
