<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable = ['nomPers','prePers','dateNaissPers','lieuNaissPers','photoPers','biblio'];
    protected $table = 'personnes';
    protected $primaryKey = 'idPers';

}
