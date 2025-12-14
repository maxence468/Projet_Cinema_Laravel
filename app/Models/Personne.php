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
        return $this->belongsToMany(Film::class, 'caste', 'pers_id', 'film_id'
        )->withPivot('nomJoue','preJoue','principale','secondaire');

    }

    public function realiser(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'realise', 'pers_id', 'film_id');

    }
        public function films_scenariser(): BelongsToMany{
            return $this->belongsToMany(Film::class, 'film_scenariste', 'pers_id', 'film_id');

        }
}
