<?php

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(refreshDatabase::class);

test('Test findAll genre', function () {

    $genres = Genre::factory()->count(3)->create();

    get(route('genres.index'))
        ->assertStatus(200)
        ->assertSee($genres[0]->libGenre);
});

test('Test find genre', function () {

    $genre = Genre::factory()->create();

    get(route('genres.show', $genre))
        ->assertStatus(200)
        ->assertSee($genre->libGenre);
});

test('Test create genre', function () {
    $genreData = [
        'libGenre' => 'Test create genre',
    ];

    post(route('genres.store'), $genreData)
        ->assertRedirect(route('genres.index'));

    assertDatabaseHas('genres', [
        'libGenre' => 'Test create genre',
    ]);
});

test('Test update genre', function () {
    $genre = Genre::factory()->create();

    patch(route('genres.update', $genre), [
        'libGenre' => 'Test update genre',
    ])->assertRedirect(route('genres.index'));

    assertDatabaseHas('genres', [
        'libGenre' => 'Test update genre',
    ]);
});

test('Test delete genre', function () {
    $genre = Genre::factory()->create();

    delete(route('genres.destroy', $genre))
        ->assertRedirect(route('genres.index'));

    assertDatabaseMissing('genres', [
        'libGenre' => $genre->libGenre,
    ]);
});
