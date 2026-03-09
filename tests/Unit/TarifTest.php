<?php

use App\Models\Tarif;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll tarif', function () {
    $tarifs = Tarif::factory()->count(3)->create();

    get(route('tarifs.index'))
        ->assertOk()
        ->assertViewIs('tarifs.index')
        ->assertViewHas('tarifs', function ($viewTarifs) use ($tarifs) {
            return $viewTarifs->pluck('idTarif')->sort()->values()->all()
                === $tarifs->pluck('idTarif')->sort()->values()->all();
        });
});

test('Test find tarif', function () {
    $tarif = Tarif::factory()->create();

    get(route('tarifs.show', $tarif))
        ->assertOk()
        ->assertViewIs('tarifs.show')
        ->assertViewHas('tarif', function ($viewTarif) use ($tarif) {
            return $viewTarif->idTarif === $tarif->idTarif;
        });
});

test('Test create tarif', function () {
    $tarifData = [
        'libTarif' => 'Test create tarif',
        'prixTarif' => 13.3,
    ];

    post(route('tarifs.store'), $tarifData)
        ->assertRedirect(route('tarifs.index'));

    assertDatabaseHas('tarifs', $tarifData);
});

test('Test update tarif', function () {
    $tarif = Tarif::factory()->create();

    patch(route('tarifs.update', $tarif), [
        'libTarif' => 'Test update tarif',
        'prixTarif' => 17.3,
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'tarif mis à jour !',
        ])
        ->assertJsonPath('tarif.libTarif', 'Test update tarif')
        ->assertJsonPath('tarif.prixTarif', 17.3);

    assertDatabaseHas('tarifs', [
        'idTarif' => $tarif->idTarif,
        'libTarif' => 'Test update tarif',
        'prixTarif' => 17.3,
    ]);
});

test('Test delete tarif', function () {
    $tarif = Tarif::factory()->create();

    delete(route('tarifs.destroy', $tarif))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Tarif supprimé avec succès !',
        ]);

    assertDatabaseMissing('tarifs', [
        'idTarif' => $tarif->idTarif,
    ]);
});
