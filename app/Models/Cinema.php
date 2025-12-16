<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';
    protected $primaryKey = 'idCinema';
    protected $fillable = ['nomCinema','adresseCinema','codePostale'];

    public function salles(): HasMany{
        return $this->HasMany(Salle::class, 'idCinema', 'idCinema');
    }
}
