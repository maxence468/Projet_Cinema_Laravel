<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titreFilm' => fake()->sentence(3),
            'descFilm' => fake()->paragraph(),
            'dateSortieFilm' => fake()->date(),
            'dureeFilm' => fake()->numberBetween(60, 180),
            'posterFilm' => fake()->imageUrl(400, 600, 'movies', true),
            'idGenre' => fake()->numberBetween(1, 20),
        ];
    }
}
