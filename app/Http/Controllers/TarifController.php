<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index(){
        $tarifs = Tarif::all();
        return view('tarifs.index',compact('tarifs'));
    }
    public function show(Tarif $tarif){
        return view('tarifs.show',compact('tarif'));
    }
}
