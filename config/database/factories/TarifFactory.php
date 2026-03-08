<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarif>
 */
class TarifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libTarif' => fake()->randomElement([
                'Enfant',
                'Adulte',
                'Senior',
                'Étudiant',
                'Réduit',
                'VIP'
            ]),
            'prixTarif' => fake()->randomFloat(2, 5, 20),
        ];
    }
}
