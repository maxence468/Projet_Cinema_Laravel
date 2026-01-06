<?php

use App\Models\Film;
use App\Models\Genre;
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

test('Test create réalisateur au film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->realisateurs()->attach($personne->idPersonne);

    assertDatabaseHas('film_realisateur', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne,
    ]);
});

test('Test create scénariste au film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->scenaristes()->attach($personne->idPersonne);

    assertDatabaseHas('film_scenariste', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne
    ]);
});

test('Test create caste (acteur) au film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->acteurs()->attach($personne->idPersonne, [
        'nomJoue' => 'James Bond',
        'preJoue' => '007',
        'principale' => true
    ]);

    assertDatabaseHas('caste', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne,
        'nomJoue' => 'James Bond',
        'principale' => 1
    ]);
});

test('Test update caste (acteur)', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->acteurs()->attach($personne->idPersonne, [
        'nomJoue' => 'Soldat Inconnu',
        'principale' => false
    ]);

    $film->acteurs()->updateExistingPivot($personne->idPersonne, [
        'nomJoue' => 'Héros Principal',
        'principale' => true
    ]);

    assertDatabaseHas('caste', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne,
        'nomJoue' => 'Héros Principal',
        'principale' => 1
    ]);

    assertDatabaseMissing('caste', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne,
        'nomJoue' => 'Soldat Inconnu'
    ]);
});

test('Test detach réalisateur d\'un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->realisateurs()->attach($personne->idPersonne);

    $film->realisateurs()->detach($personne->idPersonne);

    assertDatabaseMissing('film_realisateur', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne
    ]);
});

test('Test detach scénariste d\'un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->scenaristes()->attach($personne->idPersonne);
    $film->scenaristes()->detach($personne->idPersonne);

    assertDatabaseMissing('film_scenariste', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne
    ]);
});

test('Test detach caste (acteur) d\'un film', function() {
    $film = Film::factory()->create();
    $personne = Personne::factory()->create();

    $film->acteurs()->attach($personne->idPersonne, ['nomJoue' => 'Test', 'principale' => true]);

    $film->acteurs()->detach($personne->idPersonne);

    assertDatabaseMissing('caste', [
        'idFilm' => $film->idFilm,
        'idPersonne' => $personne->idPersonne
    ]);
});
