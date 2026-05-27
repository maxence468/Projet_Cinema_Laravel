<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{

    protected $table = 'reservations';
    protected $primaryKey = 'idReservation';
    protected $fillable = [
        'idUser',
        'idSeance',
        'dateReservation',
        'montantTotal'
    ];

    public function seance(){
        return $this->belongsTo(Seance::class, 'idSeance');
    }

    public function tarifs(): BelongsToMany {
        return $this->belongsToMany(
            Tarif::class,
            'place_reservation',
            'idReservation',
            'idTarif'
        )->withPivot('nbPlace');
    }
}
