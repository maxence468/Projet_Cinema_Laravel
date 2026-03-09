<?php

use App\Models\Cinema;
use App\Models\Salle;
use App\Models\Tarif;
use App\Models\TypeSalle;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll salle', function () {
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salles = Salle::factory()->count(3)->for($typeSalle)->for($cinema)->create();

    get(route('salles.index'))
        ->assertOk()
        ->assertViewIs('salles.index')
        ->assertViewHas('salles', function ($viewSalles) use ($salles) {
            return $viewSalles->pluck('idSalle')->sort()->values()->all()
                === $salles->pluck('idSalle')->sort()->values()->all();
        });
});

test('Test find salle', function () {
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    get(route('salles.show', $salle))
        ->assertOk()
        ->assertViewIs('salles.show')
        ->assertViewHas('salle', function ($viewSalle) use ($salle) {
            return $viewSalle->idSalle === $salle->idSalle;
        });
});

test('Test create salle', function () {
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $tarif = Tarif::factory()->create();

    $salleData = [
        'capaciteSal' => 25,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
        'idTarif' => [$tarif->idTarif],
    ];

    post(route('salles.store'), $salleData)
        ->assertRedirect(route('salles.index'));

    assertDatabaseHas('salles', [
        'capaciteSal' => 25,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
    ]);
});

test('Test update salle', function () {
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $tarif = Tarif::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    patch(route('salles.update', $salle), [
        'capaciteSal' => 38,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
        'idTarif' => [$tarif->idTarif],
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Salle mis à jour !',
        ])
        ->assertJsonPath('salle.capaciteSal', 38)
        ->assertJsonPath('salle.idTypeSalle', $typeSalle->idTypeSalle)
        ->assertJsonPath('salle.idCinema', $cinema->idCinema);

    assertDatabaseHas('salles', [
        'idSalle' => $salle->idSalle,
        'capaciteSal' => 38,
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'idCinema' => $cinema->idCinema,
    ]);
});

test('Test delete salle', function () {
    $typeSalle = TypeSalle::factory()->create();
    $cinema = Cinema::factory()->create();
    $salle = Salle::factory()->for($typeSalle)->for($cinema)->create();

    delete(route('salles.destroy', $salle))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Salle supprimée avec succès !',
        ]);

    assertDatabaseMissing('salles', [
        'idSalle' => $salle->idSalle,
    ]);
});
