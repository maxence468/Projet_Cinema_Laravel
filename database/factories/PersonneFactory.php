<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personne>
 */
class PersonneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomPers' => fake()->name(),
            'prePers' => fake()->name(),
            'dateNaissPers' => fake()->dateTimeBetween('-30 years', 'now'),
            'lieuNaissPers' => fake()->city(),
            'photoPers' => fake()->imageUrl(640, 480, 'movies', true),
            'biblio' => fake()->sentence()
        ];
    }
}
