<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomActio',
        'preActio',
    ];
    protected $primaryKey = 'idActio';
    protected $table = 'Actionnaires';
    public function investir(): BelongsToMany{
        return $this->belongsToMany(Cinema::class, 'Investir', 'idActio', 'idCinema'
        )->withPivot('argentInv');
    }
}
