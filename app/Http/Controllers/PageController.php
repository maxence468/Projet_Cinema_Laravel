<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
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

    public function recherche_film(){
        return view('recherchefilm');
    }

}
