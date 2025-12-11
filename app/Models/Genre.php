<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $primaryKey = 'idGenre';
    public $table = 'genres';
    protected $fillable = ['libGenre'];
}
