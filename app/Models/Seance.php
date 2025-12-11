<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $table = 'seances';
    protected $primaryKey = 'idSeance';
    protected $fillable = ['heureSeance', 'dateSeance', 'dureeSeance'];
}
