<?php

namespace Database\Seeders;
$faker = \Faker\Factory::create('fr_FR'); // 'fr_FR' pour français, 'en_US' pour anglai

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Personne;
use App\Models\Salle;
use App\Models\Tarif;
use App\Models\TypeSalle;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        Film::factory(20)->create();

        Genre::factory(20)->create();

        Salle::factory(20)->create();

        TypeSalle::factory(20)->create();

        Tarif::factory(20)->create();


        Salle::all()->each(function ($salle) {
            // On prend 1 à 3 tarifs aléatoires pour chaque salle
            $tarifs = Tarif::inRandomOrder()->take(rand(1, 3))->pluck('idTarif');

            foreach ($tarifs as $tarif_id) {
                DB::table('salle_tarif')->insert([
                    'idSalle' => $salle->idSalle,
                    'idTarif' => $tarif_id,
                ]);
            }
        });
    }
}
