<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PageController;
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
Route::get('/personnes/{personne}', [PersonneController::class, 'show']);

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{genre}', [GenreController::class, 'show']);

Route::get('/cinemas', [CinemaController::class, 'index']);
Route::get('/cinemas/{cinema}', [CinemaController::class, 'show']);

Route::get('/typesalles', [TypeSalleController::class, 'index']);
Route::get('/typesalles/{typesalle}', [TypeSalleController::class, 'show']);

Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/{film}', [FilmController::class, 'show']);

Route::get('/tarifs', [TarifController::class, 'index']);
Route::get('/tarifs/{tarif}', [TarifController::class, 'show']);

Route::get('/salles', [SalleController::class, 'index']);
Route::get('/salles/{salle}', [SalleController::class, 'show']);


Route::get('/seances', [SeanceController::class, 'index']);
Route::get('/seances/{seance}', [SeanceController::class, 'show']);

Route::get('/', [PageController::class, 'accueil']);

Route::get('/rechercheGenre', [PageController::class, 'genre'])->name('rechercheGenre');

Route::get('/progSemaineCinema', [PageController::class, 'progSemaineCinema'])->name('progSemaineCinema');;

Route::get('/recherche_film', [PageController::class, 'chercheFilm'])->name('recherchefilm');
