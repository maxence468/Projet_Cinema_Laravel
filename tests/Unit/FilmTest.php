<?php

use App\Models\Film;
use App\Models\Genre;
use App\Models\Personne;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll film', function () {
    $genre = Genre::factory()->create();
    $films = Film::factory()->count(3)->for($genre)->create();

    get(route('films.index'))
        ->assertOk()
        ->assertViewIs('films.index')
        ->assertViewHas('films', function ($viewFilms) use ($films) {
            return $viewFilms->pluck('idFilm')->sort()->values()->all()
                === $films->pluck('idFilm')->sort()->values()->all();
        });
});

test('Test find film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();

    get(route('films.show', $film))
        ->assertOk()
        ->assertViewIs('films.show')
        ->assertViewHas('film', function ($viewFilm) use ($film) {
            return $viewFilm->idFilm === $film->idFilm;
        });
});

test('Test create film', function () {
    $genre = Genre::factory()->create();

    $filmData = [
        'titreFilm' => 'Film test create',
        'descFilm' => 'Test de la création d\'un film',
        'dateSortieFilm' => '2025-01-01',
        'dureeFilm' => 120,
        'posterFilm' => 'test.jpg',
        'idGenre' => $genre->idGenre,
    ];

    post(route('films.store'), $filmData)
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Film ajouté',
        ])
        ->assertJsonPath('film.titreFilm', 'Film test create')
        ->assertJsonPath('film.idGenre', $genre->idGenre);

    assertDatabaseHas('films', $filmData);
});

test('Test update film', function () {
    $oldGenre = Genre::factory()->create();
    $newGenre = Genre::factory()->create();
    $film = Film::factory()->for($oldGenre)->create();

    patch(route('films.update', $film), [
        'titreFilm' => 'Film test update',
        'descFilm' => 'Test de la modification d\'un film',
        'dateSortieFilm' => '2025-01-01',
        'dureeFilm' => 120,
        'posterFilm' => 'test.jpg',
        'idGenre' => $newGenre->idGenre,
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Film mis à jour !',
        ])
        ->assertJsonPath('film.titreFilm', 'Film test update')
        ->assertJsonPath('film.idGenre', $newGenre->idGenre);

    assertDatabaseHas('films', [
        'idFilm' => $film->idFilm,
        'titreFilm' => 'Film test update',
        'descFilm' => 'Test de la modification d\'un film',
        'dateSortieFilm' => '2025-01-01',
        'dureeFilm' => 120,
        'posterFilm' => 'test.jpg',
        'idGenre' => $newGenre->idGenre,
    ]);
});

test('Test delete film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();

    delete(route('films.destroy', $film))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Film supprimé avec succès !',
        ]);

    assertDatabaseMissing('films', [
        'idFilm' => $film->idFilm,
    ]);
});

test('Test create réalisateur dans un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->realisateurs()->attach($personne->idPers);

    assertDatabaseHas('realise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
    ]);
});

test('Test create scénariste dans un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->scenariste()->attach($personne->idPers);

    assertDatabaseHas('scenarise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
    ]);
});

test('Test create caste (acteur) dans un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->casting()->attach($personne->idPers, [
        'nomJoue' => 'Bond',
        'preJoue' => 'James',
        'principale' => true,
        'secondaire' => false,
    ]);

    assertDatabaseHas('caste', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
        'nomJoue' => 'Bond',
        'preJoue' => 'James',
        'principale' => true,
        'secondaire' => false,
    ]);
});

test('Test update caste (acteur) dans un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->casting()->attach($personne->idPers, [
        'nomJoue' => 'Bond',
        'preJoue' => 'James',
        'principale' => true,
        'secondaire' => false,
    ]);

    $film->casting()->updateExistingPivot($personne->idPers, [
        'nomJoue' => 'Test update',
        'preJoue' => 'Test update',
        'principale' => false,
        'secondaire' => true,
    ]);

    assertDatabaseHas('caste', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
        'nomJoue' => 'Test update',
        'preJoue' => 'Test update',
        'principale' => false,
        'secondaire' => true,
    ]);
});

test('Test detach réalisateur d\'un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->realisateurs()->attach($personne->idPers);
    $film->realisateurs()->detach($personne->idPers);

    assertDatabaseMissing('realise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
    ]);
});

test('Test detach scénariste d\'un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->scenariste()->attach($personne->idPers);
    $film->scenariste()->detach($personne->idPers);

    assertDatabaseMissing('scenarise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
    ]);
});

test('Test detach caste (acteur) d\'un film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for($genre)->create();
    $personne = Personne::factory()->create();

    $film->casting()->attach($personne->idPers, [
        'nomJoue' => 'Test',
        'preJoue' => 'Test',
        'principale' => true,
        'secondaire' => false,
    ]);

    $film->casting()->detach($personne->idPers);

    assertDatabaseMissing('caste', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
        'nomJoue' => 'Test',
        'preJoue' => 'Test',
        'principale' => true,
        'secondaire' => false,
    ]);
});
