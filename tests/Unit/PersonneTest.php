<?php

use App\Models\Personne;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll personne', function () {
    $personnes = Personne::factory()->count(3)->create();

    get(route('personnes.index'))
        ->assertOk()
        ->assertViewIs('personnes.index')
        ->assertViewHas('personnes', function ($viewPersonnes) use ($personnes) {
            return $viewPersonnes->pluck('idPers')->sort()->values()->all()
                === $personnes->pluck('idPers')->sort()->values()->all();
        });
});

test('Test find personne', function () {
    $personne = Personne::factory()->create();

    get(route('personnes.show', $personne))
        ->assertOk()
        ->assertViewIs('personnes.show')
        ->assertViewHas('personne', function ($viewPersonne) use ($personne) {
            return $viewPersonne->idPers === $personne->idPers;
        });
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

    assertDatabaseHas('personnes', $personneData);
});

test('Test update personne', function () {
    $personne = Personne::factory()->create();

    patch(route('personnes.update', $personne), [
        'nomPers' => 'PersonneTestUpdate',
        'prePers' => 'PersonneTestUpdate',
        'dateNaissPers' => '2025-01-01',
        'lieuNaissPers' => 'Ville',
        'photoPers' => 'test.jpg',
        'biblio' => 'Biblio',
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Personne mise à jour !',
        ])
        ->assertJsonPath('personne.nomPers', 'PersonneTestUpdate')
        ->assertJsonPath('personne.prePers', 'PersonneTestUpdate');

    assertDatabaseHas('personnes', [
        'idPers' => $personne->idPers,
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
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Personne supprimé avec succès !',
        ]);

    assertDatabaseMissing('personnes', [
        'idPers' => $personne->idPers,
    ]);
});
