<?php

namespace App\Http\Controllers;

use App\Models\TypeSalle;
use Illuminate\Http\Request;

class TypeSalleController extends Controller
{
    public function index(){
        $typesalles = TypeSalle::all();
        return view('typesalles.index', compact('typesalles'));
    }
    public function show(TypeSalle $typesalle){
        return view('typesalles.show', compact('typesalle'));
    }
}
