<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function accueil(){
        $films = Film::all();
        $salles = Salle::all();
        $seances = Seance::all();
        $cinemas = Cinema::all();

        return view('pageAccueil',compact('films','salles','seances','cinemas'));
    }
}
