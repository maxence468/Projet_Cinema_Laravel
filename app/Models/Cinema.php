<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';
    protected $primaryKey = 'idCinema';
    protected $fillable = ['nomCinema','adresseCinema','codePostale'];

    public function salles(): hasMany{
        return $this->hasMany(Salle::class, 'idCinema', 'idCinema');
    }
}
