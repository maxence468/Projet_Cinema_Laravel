<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'idReservation';
    protected $fillable = ['idUser','idSeance','nbPlace','dateReservation','montantTotal'];

    public function seance(){
        return $this->belongsTo(Seance::class, 'idSeance');
    }
}
