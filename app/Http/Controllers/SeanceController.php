<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index(){
        $seances = Seance::all();
        return view('seances.index', compact('seances'));
    }
    public function show(Seance $seance){
        return view('seances.show', compact('seance'));

    }
}
