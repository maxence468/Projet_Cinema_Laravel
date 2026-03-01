import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/gestionFilm.js',
                'resources/js/gestionGenre.js',
                'resources/js/gestionPersonne.js',
                'resources/js/gestionCasting.js',
                'resources/js/gestionCinema.js',
                'resources/js/gestionSalle.js',
                'resources/js/gestionSeance.js',
                'resources/js/gestionTarif.js',
                'resources/js/gestionTypeSalle.js',
            ],
            refresh: true,
        }),
    ],
});
