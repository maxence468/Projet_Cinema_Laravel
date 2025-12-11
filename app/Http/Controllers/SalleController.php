<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index(){
        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }
    public function show(Salle $salle){
        return view('salles.show', compact('salle'));
    }
}
