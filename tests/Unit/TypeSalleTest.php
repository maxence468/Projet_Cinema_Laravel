<?php

use App\Models\TypeSalle;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('Test findAll typeSalle', function () {
    $typesSalles = TypeSalle::factory()->count(3)->create();

    get(route('typesalles.index'))
        ->assertOk()
        ->assertViewIs('typesalles.index')
        ->assertViewHas('typesalles', function ($viewTypeSalles) use ($typesSalles) {
            return $viewTypeSalles->pluck('idTypeSalle')->sort()->values()->all()
                === $typesSalles->pluck('idTypeSalle')->sort()->values()->all();
        });
});

test('Test find typeSalle', function () {
    $typeSalle = TypeSalle::factory()->create();

    get(route('typesalles.show', $typeSalle))
        ->assertOk()
        ->assertViewIs('typesalles.show')
        ->assertViewHas('typesalle', function ($viewTypeSalle) use ($typeSalle) {
            return $viewTypeSalle->idTypeSalle === $typeSalle->idTypeSalle;
        });
});

test('Test create typeSalle', function () {
    $typeSalleData = [
        'libTypeSalle' => 'Test create typeSalle',
        'prixTypeSalle' => 15.6,
    ];

    post(route('typesalles.store'), $typeSalleData)
        ->assertRedirect(route('typesalles.index'));

    assertDatabaseHas('typesalles', $typeSalleData);
});

test('Test update typeSalle', function () {
    $typeSalle = TypeSalle::factory()->create();

    patch(route('typesalles.update', $typeSalle), [
        'libTypeSalle' => 'Test update typeSalle',
        'prixTypeSalle' => 19.6,
    ])
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'type salle mis à jour !',
        ])
        ->assertJsonPath('typeSalle.libTypeSalle', 'Test update typeSalle')
        ->assertJsonPath('typeSalle.prixTypeSalle', 19.6);

    assertDatabaseHas('typesalles', [
        'idTypeSalle' => $typeSalle->idTypeSalle,
        'libTypeSalle' => 'Test update typeSalle',
        'prixTypeSalle' => 19.6,
    ]);
});

test('Test delete typeSalle', function () {
    $typeSalle = TypeSalle::factory()->create();

    delete(route('typesalles.destroy', $typeSalle))
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Type salle supprimé avec succès !',
        ]);

    assertDatabaseMissing('typesalles', [
        'idTypeSalle' => $typeSalle->idTypeSalle,
    ]);
});
