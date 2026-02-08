<?php

use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// Réinitialise la base de données après chaque test
uses(RefreshDatabase::class);

test('Test findAll seance', function() {

    $film = Film::factory()->create();

    $salle = Salle::factory()->create();

    $seances = Seance::factory()->count(3)->for($film)->for($salle)->create();

    get(route('seances.index'))
        ->assertStatus(200)
        ->assertSee($seances[0]->idSeance);
});

test('Test find seance', function() {

    $film = Film::factory()->create();

    $salle = Salle::factory()->create();

    $seance = Seance::factory()->for($film)->for($salle)->create();

    get(route('seances.show', $seance))
        ->assertStatus(200)
        ->assertSee($seance->idSeance);
});

test('Test create seance', function() {

    $film = Film::factory()->create();

    $salle = Salle::factory()->create();

    $seanceData = [
        'heureSeance' => '14:00',
        'dateSeance' => '2025-11-30',
        'dureeSeance' => 110,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ];

    post(route('seances.store'), $seanceData)
        ->assertRedirect(route('seances.index'));

    assertDatabaseHas('seances', [
        'heureSeance' => '14:00',
        'dateSeance' => '2025-11-30',
        'dureeSeance' => 110,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ]);
});

test('Test update seance', function() {

    $film = Film::factory()->create();

    $salle = Salle::factory()->create();

    $seance = Seance::factory()->for($film)->for($salle)->create();

    patch(route('seances.update', $seance), [
        'heureSeance' => '10:00',
        'dateSeance' => '2025-12-31',
        'dureeSeance' => 90,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ])->assertRedirect(route('seances.index'));

    assertDatabaseHas('seances', [
        'heureSeance' => '10:00',
        'dateSeance' => '2025-12-31',
        'dureeSeance' => 90,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ]);
});

test('Test delete seance', function() {

    $film = Film::factory()->create();

    $salle = Salle::factory()->create();

    $seance = Seance::factory()->for($film)->for($salle)->create();

    delete(route('seances.destroy', $seance))
        ->assertRedirect(route('seances.index'));

    assertDatabaseMissing('seances', [
        'idSeance' => $seance->idSeance,
        'heureSeance' => $seance->heureSeance,
        'dateSeance' => $seance->dateSeance,
        'dureeSeance' => $seance->dureeSeance,
        'idFilm' => $seance->idFilm,
        'idSalle' => $seance->idSalle,
    ]);
});
