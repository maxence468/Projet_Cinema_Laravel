<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    public function index(){
        $personnes = Personne::all();
        return view('personnes.index',compact('personnes'));
    }

    public function show(Personne $personne){
        return view('personnes.show',compact('personne'));
    }
}
