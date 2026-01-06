<?php

use App\Models\Tarif;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// Réinitialise la base de données après chaque test
uses(RefreshDatabase::class);

test('Test findAll tarif', function () {

    $tarifs = Tarif::factory()->count(3)->create();

    get(route('tarifs.index'))
        ->assertStatus(200)
        ->assertSee($tarifs[0]->libTarif);
});

test('Test find tarif', function () {

    $tarif = Tarif::factory()->create();

    get(route('tarifs.show', $tarif))
        ->assertStatus(200)
        ->assertSee($tarif->libTarif);
});

test('Test create tarif', function () {
    $tarifData = [
        'libTarif' => 'Test create tarif',
        'prixTarif' => 13.3,
    ];

    post(route('tarifs.store'), $tarifData)
        ->assertRedirect(route('tarifs.index'));

    assertDatabaseHas('tarifs', [
        'libTarif' => 'Test create tarif',
        'prixTarif' => 13.3,
    ]);
});

test('Test update tarif', function () {
    $tarif = Tarif::factory()->create();

    patch(route('tarifs.update', $tarif), [
        'libTarif' => 'Test update tarif',
        'prixTarif' => 17.3
    ])->assertRedirect(route('tarifs.index'));

    assertDatabaseHas('tarifs', [
        'libTarif' => 'Test update tarif',
        'prixTarif' => 17.3,
    ]);
});

test('Test delete tarif', function () {
    $tarif = Tarif::factory()->create();

    delete(route('tarifs.destroy', $tarif))
        ->assertRedirect(route('tarifs.index'));

    assertDatabaseMissing('tarifs', [
        'libTarif' => $tarif->libTarif,
    ]);
});
