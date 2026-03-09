<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Personne;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Tarif;
use App\Models\TypeSalle;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function getAllGenre(){
        $genres = Genre::all();
        return response()->json([
            'genres' => $genres
        ]);
    }

    public function getAllPersonne(){
        $personnes = Personne::all();
        return response()->json([
            'personnes' => $personnes
        ]);
    }

    public function getAllFilm(){
        $films = Film::all();
        return response()->json([
            'films' => $films
        ]);
    }
    public function getAllCinema(){
        $cinemas = Cinema::all();
        return response()->json([
            'cinemas' => $cinemas
        ]);
    }
    public function getAllSalle(){
        $salles = Salle::with('cinema')->get();
        return response()->json([
            'salles' => $salles
        ]);
    }

    public function getAllSeance(){
        $seances = Seance::with('film')->with('salle.cinema')->get();
        return response()->json([
            'seances' => $seances
        ]);
    }
    public function getAllTarif(){
        $tarifs = Tarif::all();
        return response()->json([
            'tarifs' => $tarifs
        ]);
    }
    public function getAllTypeSalle(){
        $typeSalles = TypeSalle::all();
        return response()->json([
            'typeSalles' => $typeSalles
        ]);
    }
}
