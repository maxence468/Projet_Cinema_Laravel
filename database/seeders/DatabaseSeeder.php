<?php

namespace Database\Seeders;
$faker = \Faker\Factory::create('fr_FR'); // 'fr_FR' pour français, 'en_US' pour anglai

use App\Models\Cinema;
use App\Models\Personne;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Personne::factory(20)->create();

        Cinema::factory(20)->create();
    }
}
