<?php

use App\Models\Cinema;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// Réinitialise la base de données après chaque test
uses(RefreshDatabase::class);

test('Test findAll cinema', function() {
    $cinemas = Cinema::factory()->count(3)->create();

    get(route('cinemas.index'))
        ->assertStatus(200)
        ->assertSee($cinemas[0]->nomCinema);
});

test('Test find cinema', function() {
    $cinema = Cinema::factory()->create();

    get(route('cinemas.show', $cinema))
        ->assertStatus(200)
        ->assertSee($cinema->nomCinema);
});

test('Test create cinema', function () {
    $cinemaData = [
        'nomCinema' => 'Cinema test create',
        'adresseCinema' => '9999 rue du cinéma',
        'codePostale' => '99999',
    ];

    post(route('cinemas.store'), $cinemaData)
        ->assertRedirect(route('cinemas.index'));

    assertDatabaseHas('cinemas', [
        'nomCinema' => 'Cinema test create',
        'adresseCinema' => '9999 rue du cinéma',
        'codePostale' => '99999',
    ]);
});

test('Test update cinema', function() {
    $cinema = Cinema::factory()->create();

    patch(route('cinemas.update', $cinema), [
        'nomCinema' => 'Cinema test update',
        'adresseCinema' => '1111 rue du cinéma',
        'codePostale' => '11111',
    ])->assertRedirect(route('cinemas.index'));

    assertDatabaseHas('cinemas', [
        'nomCinema' => 'Cinema test update',
        'adresseCinema' => '1111 rue du cinéma',
        'codePostale' => '11111',
    ]);
});

test('Test delete cinema', function () {
    $cinema = Cinema::factory()->create();

    delete(route('cinemas.destroy', $cinema))
        ->assertRedirect(route('cinemas.index'));

    assertDatabaseMissing('cinemas', [
        'idCinema' => $cinema->idCinema,
    ]);
});


