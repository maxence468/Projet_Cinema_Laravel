<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['titreFilm','descFilm','posterFilm','dateSortieFilm','idGenre','dureeFilm'];
    protected $primaryKey = 'idFilm';
    protected $table = 'films';

    public function genre(): BelongsTo{
        return $this->belongsTo(Genre::class, 'idGenre', 'idGenre');
    }

    public function casting(): BelongsToMany{
        return $this->belongsToMany(Personne::class, 'caste', 'film_id', 'pers_id'
        )->withPivot('nomJoue','preJoue','principale','secondaire');

    }
    public function realisateurs(): BelongsToMany{
        return $this->belongsToMany(Personne::class, 'realise', 'film_id', 'pers_id');
    }

    public function scenariste(): BelongsToMany{
        return $this->belongsToMany(Personne::class, 'scenarise', 'film_id', 'pers_id');
    }
}
