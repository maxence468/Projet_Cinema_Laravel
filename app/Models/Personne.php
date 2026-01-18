<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = ['nomPers','prePers','dateNaissPers','lieuNaissPers','photoPers','biblio'];
    protected $table = 'personnes';
    protected $primaryKey = 'idPers';
    public function films(): BelongsToMany{
        return $this->belongsToMany(Film::class, 'caste', 'idPers', 'idFilm'
        )->withPivot('nomJoue','preJoue','principale','secondaire');
    }

    public function realiser(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'realise', 'idPers', 'idFilm');
    }
    public function films_scenariser(): BelongsToMany{
        return $this->belongsToMany(Film::class, 'scenarise', 'idPers', 'idFilm');
    }

    public function film_realisateur(): BelongsToMany{
        return $this->belongsToMany(Film::class, 'realise', 'idPers', 'idFilm');
    }
}
