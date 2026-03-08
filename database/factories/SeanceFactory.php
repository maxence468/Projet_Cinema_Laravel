<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */

class SeanceFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'heureSeance' => fake()->time(),
            'dateSeance' => fake()->date(),
            'dureeSeance' => fake()->numberBetween(60, 180),
            'idFilm' => fake()->numberBetween(1, 10),
            'idSalle' => fake()->numberBetween(1, 10),
        ];
    }
}
