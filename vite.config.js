import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'ressource/js/gestionFilm.js',
                'ressource/js/gestionGenre.js',
                'ressource/js/gestionPersonne.js',
                'ressource/js/gestionCasting.js',
                'ressource/js/gestionCinema.js',
                'ressource/js/gestionSalle.js',
                'ressource/js/gestionSeance.js',
                'ressource/js/gestionTarif.js',
                'ressource/js/gestionTypeSale.js',
                'ressource/js/stateButtoons.js',
                'ressource/js/updateSelect.js'
            ],
            refresh: true,
        }),
    ],
});
