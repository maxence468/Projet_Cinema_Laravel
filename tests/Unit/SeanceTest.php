<?php

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\TypeSalle;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll seance', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();
    $seances = Seance::factory()->count(3)->for($film)->for($salle)->create();

    get(route('seances.index'))
        ->assertOk()
        ->assertViewIs('seances.index')
        ->assertViewHas('seances', function ($viewSeances) use ($seances) {
            return $viewSeances->pluck('idSeance')->sort()->values()->all()
                === $seances->pluck('idSeance')->sort()->values()->all();
        });
});

test('Test find seance', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();
    $seance = Seance::factory()->for($film)->for($salle)->create();

    get(route('seances.show', $seance))
        ->assertOk()
        ->assertViewIs('seances.show')
        ->assertViewHas('seance', function ($viewSeance) use ($seance) {
            return $viewSeance->idSeance === $seance->idSeance;
        });
});

test('Test create seance', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    $seanceData = [
        'heureSeance' => '14:00',
        'dateSeance' => '2025-11-30',
        'dureeSeance' => 110,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ];

    post(route('seances.store'), $seanceData)
        ->assertRedirect(route('seances.index'));

    assertDatabaseHas('seances', $seanceData);
});

test('Test update seance', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();
    $seance = Seance::factory()->for($film)->for($salle)->create();

    patch(route('seances.update', $seance), [
        'heureSeance' => '10:00',
        'dateSeance' => '2025-12-31',
        'dureeSeance' => 90,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Seance mis à jour !',
        ])
        ->assertJsonPath('seance.heureSeance', '10:00')
        ->assertJsonPath('seance.dateSeance', '2025-12-31')
        ->assertJsonPath('seance.dureeSeance', 90);

    assertDatabaseHas('seances', [
        'idSeance' => $seance->idSeance,
        'heureSeance' => '10:00',
        'dateSeance' => '2025-12-31',
        'dureeSeance' => 90,
        'idFilm' => $film->idFilm,
        'idSalle' => $salle->idSalle,
    ]);
});

test('Test delete seance', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();
    $seance = Seance::factory()->for($film)->for($salle)->create();

    delete(route('seances.destroy', $seance))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Seance supprimée avec succès !',
        ]);

    assertDatabaseMissing('seances', [
        'idSeance' => $seance->idSeance,
    ]);
});
