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



Route::get('/personnes', [PersonneController::class, 'index'])->name('personnes.index');
Route::get('/personnes/create', [PersonneController::class, 'create'])->name('personnes.create');
Route::post('/personnes', [PersonneController::class, 'store'])->name('personnes.store');
Route::get('/personnes/{personne}', [PersonneController::class, 'show'])->name('personnes.show');
Route::get('/personnes/edit/{personne}', [PersonneController::class, 'edit'])->name('personnes.edit');
Route::patch('/personnes/{personne}', [PersonneController::class, 'update'])->name('personnes.update');
Route::delete('/personnes/{personne}', [PersonneController::class, 'destroy'])->name('personnes.destroy');

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genres/edit/{genre}', [GenreController::class, 'edit'])->name('genres.edit');
Route::patch('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');

Route::get('/cinemas', [CinemaController::class, 'index'])->name('cinemas.index');
Route::get('/cinemas/create', [CinemaController::class, 'create'])->name('cinemas.create');
Route::post('/cinemas', [CinemaController::class, 'store'])->name('cinemas.store');
Route::get('/cinemas/{cinema}', [CinemaController::class, 'show'])->name('cinemas.show');
Route::get('/cinemas/edit/{cinema}', [CinemaController::class, 'edit'])->name('cinemas.edit');
Route::patch('/cinemas/{cinema}', [CinemaController::class, 'update'])->name('cinemas.update');
Route::delete('/cinemas/{cinema}', [CinemaController::class, 'destroy'])->name('cinemas.destroy');

Route::get('/typesalles', [TypeSalleController::class, 'index'])->name('typesalles.index');
Route::get('/typesalles/create', [TypeSalleController::class, 'create'])->name('typesalles.create');
Route::post('/typesalles', [TypeSalleController::class, 'store'])->name('typesalles.store');
Route::get('/typesalles/{typesalle}', [TypeSalleController::class, 'show'])->name('typesalles.show');
Route::get('/typesalles/edit/{typesalle}', [TypeSalleController::class, 'edit'])->name('typesalles.edit');
Route::patch('/typesalles/{typesalle}', [TypeSalleController::class, 'update'])->name('typesalles.update');
Route::delete('/typesalles/{typeSalle}', [TypeSalleController::class, 'destroy'])->name('typesalles.destroy');

Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('/films', [FilmController::class, 'store'])->name('films.store');
Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');
Route::get('/films/edit/{film}', [FilmController::class, 'edit'])->name('films.edit');
Route::patch('/films/{film}', [FilmController::class, 'update'])->name('films.update');
Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');

Route::get('/tarifs', [TarifController::class, 'index'])->name('tarifs.index');
Route::get('/tarifs/create', [TarifController::class, 'create'])->name('tarifs.create');
Route::post('/tarifs', [TarifController::class, 'store'])->name('tarifs.store');
Route::get('/tarifs/{tarif}', [TarifController::class, 'show'])->name('tarifs.show');
Route::get('/tarifs/edit/{tarif}', [TarifController::class, 'edit'])->name('tarifs.edit');
Route::patch('/tarifs/{tarif}', [TarifController::class, 'update'])->name('tarifs.update');
Route::delete('/tarifs/delete/{tarif}', [TarifController::class, 'destroy'])->name('tarifs.destroy');

Route::get('/salles', [SalleController::class, 'index'])->name('salles.index');
Route::get('/salles/create', [SalleController::class, 'create'])->name('salles.create');
Route::post('/salles', [SalleController::class, 'store'])->name('salles.store');
Route::get('/salles/{salle}', [SalleController::class, 'show'])->name('salles.show');
Route::get('/salles/edit/{salle}', [SalleController::class, 'edit'])->name('salles.edit');
Route::patch('/salles/{salle}', [SalleController::class, 'update'])->name('salles.update');
Route::delete('/salles/{salle}', [SalleController::class, 'destroy'])->name('salles.destroy');

Route::get('/seances', [SeanceController::class, 'index'])->name('seances.index');
Route::get('/seances/create', [SeanceController::class, 'create'])->name('seances.create');
Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');
Route::get('/seances/{seance}', [SeanceController::class, 'show'])->name('seances.show');
Route::get('/seances/{seance}/edit', [SeanceController::class, 'edit'])->name('seances.edit');
Route::patch('/seances/{seance}', [SeanceController::class, 'update'])->name('seances.update');
Route::delete('/seances/{seance}', [SeanceController::class, 'destroy'])->name('seances.destroy');


Route::get('/', [PageController::class, 'accueil']);

Route::get('/rechercheGenre', [PageController::class, 'genre'])->name('rechercheGenre');

Route::get('/progSemaineCinema', [PageController::class, 'progSemaineCinema'])->name('progSemaineCinema');;

Route::get('/rechercheFilm', [PageController::class, 'chercheFilm'])->name('recherchefilm');

Route::get('/rechercheActeur', [PageController::class, 'rechercheActeur'])->name('rechercheActeur');
