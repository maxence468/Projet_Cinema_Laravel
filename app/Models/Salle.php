<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Salle extends Model

{
    use HasFactory;

    public function tarifs() : BelongsToMany{
        return $this->belongsToMany(Tarif::class, 'salle_tarif', 'idSalle', 'idTarif');
    }
    public function typesalle(): BelongsTo{
      return $this->belongsTo(TypeSalle::class, 'idTypeSalle','idTypeSalle');
    }

    public function cinema(): BelongsTo{
        return $this->belongsTo(Cinema::class, 'idCinema','idCinema');
    }

    protected $table = 'salles';
    protected $primaryKey = 'idSalle';
    protected $fillable = ['capaciteSal','idTypeSalle','idCinema'];
}
