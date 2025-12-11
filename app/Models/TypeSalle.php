<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSalle extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTypeSalle';
    protected $table = 'typesalles';
    protected $fillable = ['libTypeSalle'];
}
