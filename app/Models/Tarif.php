<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarif extends Model
{

    use HasFactory;
    public function salles() : BelongsToMany{
        return $this->belongsToMany(Salle::class, 'salle_tarif', 'idTarif', 'idSalle');
    }
    protected $table = 'tarifs';
    protected $fillable = ['libTarif','prixTarif'];
    protected $primaryKey = 'idTarif';
}
