import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/carousel3Items.js',
                'resources/js/effectuerReservation.js',
                'resources/js/gestionCasting.js',
                'resources/js/gestionCinema.js',
                'resources/js/gestionFilm.js',
                'resources/js/gestionGenre.js',
                'resources/js/gestionPersonne.js',
                'resources/js/gestionSalle.js',
                'resources/js/gestionSeance.js',
                'resources/js/gestionTarif.js',
                'resources/js/gestionTypeSalle.js',
                'resources/js/hamburgerMenu.js',
                'resources/js/modifierReservation.js',
                'resources/js/reservationParticipant.js',
                'resources/js/stateButtons.js',
                'resources/js/updateSelect.js'
            ],
            refresh: true,
        }),
    ],
    base: '/P2026/BARTHELEMY/',
});
