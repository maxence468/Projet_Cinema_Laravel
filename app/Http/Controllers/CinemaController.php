<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index(){
        $cinemas = Cinema::all();
        return view('cinemas.index',compact('cinemas'));
    }


    public function show(Cinema $cinema){
        return view('cinemas.show',compact('cinema'));
    }
}
