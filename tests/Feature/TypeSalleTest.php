<?php

use App\Models\TypeSalle;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// Réinitialise la base de données après chaque test
uses(RefreshDatabase::class);

test('Test findAll typeSalle', function() {

    $salles = TypeSalle::factory()->count(3)->create();

    get(route('typesalles.index'))
        ->assertStatus(200)
        ->assertSee($salles[0]->libTypeSalle);

});

test('Test find typeSalle', function() {

   $typeSalle = TypeSalle::factory()->create();

   get(route('typesalles.show', $typeSalle))
    ->assertStatus(200)
    ->assertSee($typeSalle->libTypeSalle);
});

test('Test create typeSalle', function() {
    $typeSalleData = [
        'libTypeSalle' => 'Test create typeSalle',
        'prixTypeSalle' => 15.6,
    ];

    post(route('typesalles.store'), $typeSalleData)
        ->assertRedirect(route('typesalles.index'));

    assertDatabaseHas('typesalles', [
        'libTypeSalle' => 'Test create typeSalle',
        'prixTypeSalle' => 15.6,
    ]);
});

test('Test update typeSalle', function() {
    $typeSalle = TypeSalle::factory()->create();

    patch(route('typesalles.update', $typeSalle), [
        'libTypeSalle' => 'Test update typeSalle',
        'prixTypeSalle' => 19.6,
    ])->assertRedirect(route('typesalles.index'));

    assertDatabaseHas('typesalles', [
        'libTypeSalle' => 'Test update typeSalle',
        'prixTypeSalle' => 19.6,
    ]);
});

test('Test delete typeSalle', function() {
    $typeSalle = TypeSalle::factory()->create();

    delete(route('typesalles.destroy', $typeSalle))
        ->assertRedirect(route('typesalles.index'));

    assertDatabaseMissing('typesalles', [
        'libTypeSalle' => $typeSalle->libTypeSalle,
    ]);
});
