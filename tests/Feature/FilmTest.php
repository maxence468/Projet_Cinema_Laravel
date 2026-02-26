<?php

use App\Models\Film;
use App\Models\Genre;
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


test('Test findAll film', function () {
    $genre = Genre::factory()->create();
    $films = Film::factory()->count(3)->for($genre)->create();

    get(route('films.index'))
        ->assertStatus(200)
        ->assertSee($films[0]->titreFilm);
});

test('Test find film', function () {
    $film = Film::factory()->for(Genre::factory())->create();

    get(route('films.show', $film))
        ->assertStatus(200)
        ->assertSee($film->titreFilm);
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
        ->assertRedirect(route('films.index'));

    assertDatabaseHas('films', [
        'titreFilm' => 'Film test create',
        'descFilm' => 'Test de la création d\'un film',
        'dateSortieFilm' => '2025-01-01',
        'dureeFilm' => 120,
        'posterFilm' => 'test.jpg',
        'idGenre' => $genre->idGenre,
    ]);
});

test('Test update film', function () {
    $genre = Genre::factory()->create();
    $film = Film::factory()->for(Genre::factory())->create();

    patch(route('films.update', $film), [
        'titreFilm' => 'Film test update',
        'descFilm' => 'Test de la modification d\'un film',
        'dateSortieFilm' => '2025-01-01',
        'dureeFilm' => 120,
        'posterFilm' => 'test.jpg',
        'idGenre' => $genre->idGenre,
    ])->assertRedirect(route('films.index'));

    assertDatabaseHas('films', [
        'titreFilm' => 'Film test update',
        'descFilm' => 'Test de la modification d\'un film',
        'dateSortieFilm' => '2025-01-01',
        'dureeFilm' => 120,
        'posterFilm' => 'test.jpg',
        'idGenre' => $genre->idGenre,
    ]);
});

test('Test delete film', function () {
    $film = Film::factory()->for(Genre::factory())->create();

    delete(route('films.destroy', $film))
        ->assertRedirect(route('films.index'));

    assertDatabaseMissing('films', [
        'idFilm' => $film->idFilm,
    ]);
});

test('Test create réalisateur dans un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->realisateurs()->attach($personne->idPers);

    assertDatabaseHas('realise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
    ]);
});

test('Test create scénariste dans un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->scenariste()->attach($personne->idPers);

    assertDatabaseHas('scenarise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers
    ]);
});

test('Test create caste (acteur) dans un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->casting()->attach($personne->idPers, [
        'nomJoue' => 'Bond',
        'preJoue' => 'James',
        'principale' => true,
        'secondaire'=> false
    ]);

    assertDatabaseHas('caste', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
        'nomJoue' => 'Bond',
        'preJoue' => 'James',
        'principale' => true,
        'secondaire'=> false,
    ]);
});

test('Test update caste (acteur) dans un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->casting()->attach($personne->idPers, [
        'nomJoue' => 'Bond',
        'preJoue' => 'James',
        'principale' => true,
        'secondaire'=> false,
    ]);

    $film->casting()->updateExistingPivot($personne->idPers, [
        'nomJoue' => 'Test update',
        'preJoue' => 'Test update',
        'principale' => false,
        'secondaire'=> true,
    ]);

    assertDatabaseHas('caste', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
        'nomJoue' => 'Test update',
        'preJoue' => 'Test update',
        'principale' => false,
        'secondaire'=> true,
    ]);
});

test('Test detach réalisateur d\'un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->realisateurs()->attach($personne->idPers);

    $film->realisateurs()->detach($personne->idPers);

    assertDatabaseMissing('realise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers
    ]);
});

test('Test detach scénariste d\'un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->scenariste()->attach($personne->idPers);
    $film->scenariste()->detach($personne->idPers);

    assertDatabaseMissing('scenarise', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers
    ]);
});

test('Test detach caste (acteur) d\'un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->casting()->attach($personne->idPers, [
        'nomJoue' => 'Test',
        'preJoue' => 'Test',
        'principale' => true,
        'secondaire' => false
    ]);

    $film->casting()->detach($personne->idPers);

    assertDatabaseMissing('caste', [
        'idFilm' => $film->idFilm,
        'idPers' => $personne->idPers,
        'nomJoue' => 'Test',
        'preJoue' => 'Test',
        'principale' => true,
        'secondaire' => false
    ]);
});
