<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = ['nomPers','prePers','dateNaissPers','lieuNaissPers','photoPers','biblio'];
    protected $table = 'personnes';
    protected $primaryKey = 'idPers';

}
