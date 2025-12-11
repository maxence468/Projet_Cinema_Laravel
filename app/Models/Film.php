<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    protected $fillable = ['titreFilm','descFilm','posterFilm','dateSortieFilm','idGenre','dureeFilm'];
    protected $primaryKey = 'idFilm';
    protected $table = 'films';

    public function genre(): BelongsTo{
        return $this->belongsTo(Genre::class, 'idGenre', 'idGenre');
    }

    public function casting(): BelongsToMany{
        return $this->belongsToMany(Personne::class, 'casting', 'film_id', 'pers_id'
        )->withPivot('nomJoue','preJoue','principale','secondaire');

    }
    public function realisateurs(): BelongsToMany{
        return $this->belongsToMany(Personne::class, 'film_realisateur', 'film_id', 'pers_id');
    }

    public function scenariste(): BelongsToMany{
        return $this->belongsToMany(Personne::class, 'film_scenariste', 'film_id', 'pers_id');
    }
}
