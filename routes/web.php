<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TypeSalleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/personnes', [PersonneController::class, 'index']);
Route::get('/personnes/create', [PersonneController::class, 'create']);
Route::post('/personnes', [PersonneController::class, 'store']);
Route::get('/personnes/{personne}', [PersonneController::class, 'show']);
Route::get('/personnes/edit/{personne}', [PersonneController::class, 'edit']);
Route::patch('/personnes/{personne}', [PersonneController::class, 'update']);
Route::delete('/personnes/{personne}', [PersonneController::class, 'destroy']);



Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/create', [GenreController::class, 'create']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/genres/{genre}', [GenreController::class, 'show']);
Route::get('/genres/edit/{genre}', [GenreController::class, 'edit']);
Route::patch('/genres/{genre}', [GenreController::class, 'update']);
Route::delete('/genres/{genre}', [GenreController::class, 'destroy']);




Route::get('/cinemas', [CinemaController::class, 'index']);
Route::get('/cinemas/create', [CinemaController::class, 'create']);
Route::POST('/cinemas', [CinemaController::class, 'store']);
Route::get('/cinemas/{cinema}', [CinemaController::class, 'show']);
Route::get('/cinemas/edit/{cinema}', [CinemaController::class, 'edit']);
Route::patch('/cinemas/{cinema}', [CinemaController::class, 'update']);
Route::delete('/cinemas/{cinema}', [CinemaController::class, 'destroy']);




Route::get('/typesalles', [TypeSalleController::class, 'index']);
Route::get('/typesalles/create', [TypeSalleController::class, 'create']);
Route::post('/typesalles', [TypeSalleController::class, 'store']);
Route::get('/typesalles/{typesalle}', [TypeSalleController::class, 'show']);
Route::get('/typesalles/edit/{typesalle}', [TypeSalleController::class, 'edit']);
Route::patch('/typesalles/{typesalle}', [TypeSalleController::class, 'update']);
Route::delete('/typesalles/{typesalle}', [TypeSalleController::class, 'destroy']);



Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/create', [FilmController::class, 'create']);
Route::post('/films', [FilmController::class, 'store'])->name('films.store');
Route::get('/films/{film}', [FilmController::class, 'show']);
Route::get('/films/edit/{film}', [FilmController::class, 'edit']);
Route::patch('/films/{film}', [FilmController::class, 'update']);
Route::delete('/films/{film}', [FilmController::class, 'destroy']);


Route::get('/tarifs', [TarifController::class, 'index']);
Route::get('/tarifs/create', [TarifController::class, 'create']);
Route::post('/tarifs', [TarifController::class, 'store']);
Route::get('/tarifs/{tarif}', [TarifController::class, 'show']);
Route::get('/tarifs/edit/{tarif}', [TarifController::class, 'edit']);
Route::patch('/tarifs/{tarif}', [TarifController::class, 'update']);
Route::delete('/tarifs/{tarif}', [TarifController::class, 'destroy']);


Route::get('/salles', [SalleController::class, 'index']);
Route::get('/salles/create', [SalleController::class, 'create']);
Route::post('/salles', [SalleController::class, 'store']);
Route::get('/salles/{salle}', [SalleController::class, 'show']);
Route::get('/salles/edit/{salle}', [SalleController::class, 'edit']);
Route::patch('/salles/{salle}', [SalleController::class, 'update']);
Route::delete('/salles/{salle}', [SalleController::class, 'destroy']);


Route::get('/seances', [SeanceController::class, 'index']);
Route::get('/seances/create', [SeanceController::class, 'create']);
Route::post('/seances', [SeanceController::class, 'store']);
Route::get('/seances/edit/{seance}', [SeanceController::class, 'edit']);
Route::patch('/seances/{seance}', [SeanceController::class, 'update']);
Route::delete('/seances/{seance}', [SeanceController::class, 'destroy']);
Route::get('/seances/{seance}', [SeanceController::class, 'show']);
