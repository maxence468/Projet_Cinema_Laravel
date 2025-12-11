<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function show(Film $film){
        return view('films.show', compact('film'));
    }
}
