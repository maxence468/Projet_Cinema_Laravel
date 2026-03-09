<?php

use App\Models\Cinema;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll cinema', function () {
    $cinemas = Cinema::factory()->count(3)->create();

    get(route('cinemas.index'))
        ->assertOk()
        ->assertViewIs('cinemas.index')
        ->assertViewHas('cinemas', function ($viewCinemas) use ($cinemas) {
            return $viewCinemas->pluck('idCinema')->sort()->values()->all()
                === $cinemas->pluck('idCinema')->sort()->values()->all();
        });
});

test('Test find cinema', function () {
    $cinema = Cinema::factory()->create();

    get(route('cinemas.show', $cinema))
        ->assertOk()
        ->assertViewIs('cinemas.show')
        ->assertViewHas('cinema', function ($viewCinema) use ($cinema) {
            return $viewCinema->idCinema === $cinema->idCinema;
        });
});

test('Test create cinema', function () {
    $cinemaData = [
        'nomCinema' => 'Cinema test create',
        'adresseCinema' => '9999 rue du cinéma',
        'codePostale' => '99999',
    ];

    post(route('cinemas.store'), $cinemaData)
        ->assertRedirect(route('cinemas.index'));

    assertDatabaseHas('cinemas', $cinemaData);
});

test('Test update cinema', function () {
    $cinema = Cinema::factory()->create();

    patch(route('cinemas.update', $cinema), [
        'nomCinema' => 'Cinema test update',
        'adresseCinema' => '1111 rue du cinéma',
        'codePostale' => '11111',
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Cinema mis à jour !',
        ])
        ->assertJsonPath('cinema.nomCinema', 'Cinema test update')
        ->assertJsonPath('cinema.adresseCinema', '1111 rue du cinéma')
        ->assertJsonPath('cinema.codePostale', '11111');

    assertDatabaseHas('cinemas', [
        'idCinema' => $cinema->idCinema,
        'nomCinema' => 'Cinema test update',
        'adresseCinema' => '1111 rue du cinéma',
        'codePostale' => '11111',
    ]);
});

test('Test delete cinema', function () {
    $cinema = Cinema::factory()->create();

    delete(route('cinemas.destroy', $cinema))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Cinema supprimé avec succès !',
        ]);

    assertDatabaseMissing('cinemas', [
        'idCinema' => $cinema->idCinema,
    ]);
});
