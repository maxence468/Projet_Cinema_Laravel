<?php

namespace Database\Factories;

use App\Models\TypeSalle;
use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'capaciteSal' => fake()->numberBetween(50, 300),
            'idTypeSalle' => fake()->numberBetween(1, 20),
            'idCinema' => Cinema::factory(),
            'idTypeSalle' => TypeSalle::factory(),
        ];
    }
}
