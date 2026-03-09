<?php

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll genre', function () {
    $genres = Genre::factory()->count(3)->create();

    get(route('genres.index'))
        ->assertOk()
        ->assertViewIs('genres.index')
        ->assertViewHas('genres', function ($viewGenres) use ($genres) {
            return $viewGenres->pluck('idGenre')->sort()->values()->all()
                === $genres->pluck('idGenre')->sort()->values()->all();
        });
});

test('Test find genre', function () {
    $genre = Genre::factory()->create();

    get(route('genres.show', $genre))
        ->assertOk()
        ->assertViewIs('genres.show')
        ->assertViewHas('genre', function ($viewGenre) use ($genre) {
            return $viewGenre->idGenre === $genre->idGenre;
        });
});

test('Test create genre', function () {
    $genreData = [
        'libGenre' => 'Test create genre',
    ];

    post(route('genres.store'), $genreData)
        ->assertRedirect(route('genres.index'));

    assertDatabaseHas('genres', $genreData);
});

test('Test update genre', function () {
    $genre = Genre::factory()->create();

    patch(route('genres.update', $genre), [
        'libGenre' => 'Test update genre',
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Genre mis à jour !',
        ])
        ->assertJsonPath('genre.libGenre', 'Test update genre');

    assertDatabaseHas('genres', [
        'idGenre' => $genre->idGenre,
        'libGenre' => 'Test update genre',
    ]);
});

test('Test delete genre', function () {
    $genre = Genre::factory()->create();

    delete(route('genres.destroy', $genre))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Genre supprimé avec succès !',
        ]);

    assertDatabaseMissing('genres', [
        'idGenre' => $genre->idGenre,
    ]);
});
