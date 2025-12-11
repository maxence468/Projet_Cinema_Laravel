<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function accueil(){
        $films = Film::all()->take(3);

        return view('accueil',compact('films'));
    }
}
