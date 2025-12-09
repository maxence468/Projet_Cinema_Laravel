<?php

use App\Http\Controllers\PersonneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/personnes', [PersonneController::class, 'index']);
