<?php

use App\Models\Cinema;
use App\Models\Salle;
use App\Models\TypeSalle;

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// Réinitialise la base de données après chaque test
uses(RefreshDatabase::class);

test('Test findAll salle', function() {

    $typeSalle = TypeSalle::factory()->create();

    $cinema = Cinema::factory()->create();

    $salles = Salle::factory()->count(3)->for($typeSalle)->for($cinema)->create();

    get(route('salles.index'))
        ->assertStatus(200)
        ->assertSee($salles[0]->idSalle);
});

test('Test find salle', function() {

    $typeSalle = TypeSalle::factory()->create();

    $cinema = Cinema::factory()->create();

    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    get(route('salles.show', $salle))
        ->assertStatus(200)
        ->assertSee($salle->idSal);
});

test('Test create salle', function() {

    $typeSalle = TypeSalle::factory()->create();

    $cinema = Cinema::factory()->create();

    $salleData = [
        'capaciteSal' => 25,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
    ];

    post(route('salles.store'), $salleData)
        ->assertRedirect(route('salles.index'));

    assertDatabaseHas('salles', [
        'capaciteSal' => 25,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
    ]);
});

test('Test update salle', function() {

    $typeSalle = TypeSalle::factory()->create();

    $cinema = Cinema::factory()->create();

    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    patch(route('salles.update', $salle), [
        'capaciteSal' => 38,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
    ])->assertRedirect(route('salles.index'));

    assertDatabaseHas('salles', [
        'capaciteSal' => 38,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
    ]);
});

test('Test delete salle', function() {

    $typeSalle = TypeSalle::factory()->create();

    $cinema = Cinema::factory()->create();

    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    delete(route('salles.destroy', $salle))
        ->assertRedirect(route('salles.index'));

    assertDatabaseMissing('salles', [
        'capaciteSal' => $salle->capaciteSal,
    ]);
});
