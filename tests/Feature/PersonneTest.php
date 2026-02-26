<?php

use App\Models\Personne;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// Réinitialise la base de données après chaque test
uses(RefreshDatabase::class);

test('Test findAll personne', function() {
    $personnes = Personne::factory()->count(3)->create();

    get(route('personnes.index'))
        ->assertStatus(200)
        ->assertSee($personnes[0]->nomPers);
});

test('Test find personne', function () {
    $personne = Personne::factory()->create();

    get(route('personnes.show', $personne))
        ->assertStatus(200)
        ->assertSee($personne->nomPers);
});

test('Test create personne', function () {
    $personneData = [
        'nomPers' => 'PersonneTestCreate',
        'prePers' => 'PersonneTestCreate',
        'dateNaissPers' => '2025-01-01',
        'lieuNaissPers' => 'Ville',
        'photoPers' => 'test.png',
        'biblio' => 'Biblio',
    ];

    post(route('personnes.store'), $personneData)
        ->assertRedirect(route('personnes.index'));

    assertDatabaseHas('personnes', [
        'nomPers' => 'PersonneTestCreate',
        'prePers' => 'PersonneTestCreate',
        'dateNaissPers' => '2025-01-01',
        'lieuNaissPers' => 'Ville',
        'photoPers' => 'test.png',
        'biblio' => 'Biblio',
    ]);
});

test('Test update personne', function() {
    $personne = Personne::factory()->create();

    patch(route('personnes.update', $personne), [
        'nomPers' => 'PersonneTestUpdate',
        'prePers' => 'PersonneTestUpdate',
        'dateNaissPers' => '2025-01-01',
        'lieuNaissPers' => 'Ville',
        'photoPers' => 'test.jpg',
        'biblio' => 'Biblio',
    ])->assertRedirect(route('personnes.index'));

    assertDatabaseHas('personnes', [
        'nomPers' => 'PersonneTestUpdate',
        'prePers' => 'PersonneTestUpdate',
        'dateNaissPers' => '2025-01-01',
        'lieuNaissPers' => 'Ville',
        'photoPers' => 'test.jpg',
        'biblio' => 'Biblio',
    ]);
});

test('Test delete personne', function () {
    $personne = Personne::factory()->create();

    delete(route('personnes.destroy', $personne))
        ->assertRedirect(route('personnes.index'));

    assertDatabaseMissing('personnes', [
        'nomPers' => $personne->nomPers,
    ]);
});
