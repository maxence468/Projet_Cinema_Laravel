<?php

namespace config\database\seeders;

use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsSeancesSemaineSeeder extends Seeder
{
    /**
     * 3 films sortis le mercredi 19/02/2025 + séances sur la semaine du 17 au 23/02/2025.
     */
    public function run(): void
    {
        $dateSortie = '2025-02-19';
        $debutSemaine = Carbon::parse('2025-02-17');
        $finSemaine = Carbon::parse('2025-02-23');
        $salles = [1, 2, 3, 4, 5, 6, 7];

        $filmsData = [
            [
                'titreFilm' => 'Echoes of Tomorrow',
                'descFilm' => "En 2045, une physicienne doit traverser les dimensions pour empêcher l'effondrement du temps. Un thriller science-fiction sur les paradoxes temporels.",
                'dureeFilm' => 128,
                'posterFilm' => 'echoes_tomorrow.jpg',
                'idGenre' => 1,
            ],
            [
                'titreFilm' => 'Rapid Response',
                'descFilm' => "Une unité d'élite doit neutraliser une cellule terroriste avant qu'elle ne frappe la capitale. Course contre la montre haletante.",
                'dureeFilm' => 115,
                'posterFilm' => 'rapid_response.jpg',
                'idGenre' => 2,
            ],
            [
                'titreFilm' => 'Sous les étoiles de Paris',
                'descFilm' => "Deux inconnus se retrouvent chaque nuit sur les toits de Paris. Une comédie romantique sur les secondes chances.",
                'dureeFilm' => 105,
                'posterFilm' => 'etoiles_paris.jpg',
                'idGenre' => 3,
            ],
        ];

        $creneauxParJour = [
            ['14:00', '18:30', '21:00'],
            ['13:30', '17:00', '20:45'],
            ['14:15', '18:00', '21:15'],
            ['10:30', '15:00', '19:30'],
            ['14:00', '17:30', '20:30'],
            ['11:00', '14:30', '18:00', '21:00'],
            ['13:00', '16:30', '20:00'],
        ];

        foreach ($filmsData as $data) {
            $film = Film::create([
                ...$data,
                'dateSortieFilm' => $dateSortie,
            ]);

            $jourIndex = 0;
            for ($d = $debutSemaine->copy(); $d->lte($finSemaine); $d->addDay(), $jourIndex++) {
                $creneaux = $creneauxParJour[$jourIndex % count($creneauxParJour)];
                foreach ($creneaux as $i => $heure) {
                    DB::table('seances')->insert([
                        'heureSeance' => $heure,
                        'dateSeance' => $d->format('Y-m-d'),
                        'dureeSeance' => $film->dureeFilm,
                        'idSalle' => $salles[($jourIndex + $i) % count($salles)],
                        'idFilm' => $film->idFilm,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
