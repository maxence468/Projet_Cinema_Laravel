<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeSalle>
 */
class TypeSalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libTypeSalle' => fake()->randomElement([
                'Classique',
                'Premium',
                'IMAX',
                '4DX',
                'Dolby Cinema',
                'VIP',
                'Grand Écran'
            ]),
            'prixTypeSalle' => fake()->randomFloat(2, 5, 20),


        ];
    }
}
