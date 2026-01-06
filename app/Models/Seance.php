<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seance extends Model
{
    use HasFactory;

    public function film(): BelongsTo{
        return $this->belongsTo(Film::class, 'idFilm','idFilm');
    }

    public function salle(): BelongsTo{
        return $this->belongsTo(Salle::class, 'idSalle','idSalle');
    }
    protected $table = 'seances';
    protected $primaryKey = 'idSeance';
    protected $fillable = ['heureSeance', 'dateSeance', 'dureeSeance','idFilm','idSalle'];

    protected $foreignKey = 'idFilm';
}
