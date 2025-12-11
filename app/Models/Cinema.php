<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    protected $table = 'cinemas';
    protected $primaryKey = 'idCinema';
    protected $fillable = ['nomCinema','adresseCinema','codePostale'];

    public function salles(): BelongsToMany{
        return $this->belongsToMany(Salle::class, 'idCinema', 'idCinema');
    }
}
