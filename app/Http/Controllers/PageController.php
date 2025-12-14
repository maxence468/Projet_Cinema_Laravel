<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

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
}
