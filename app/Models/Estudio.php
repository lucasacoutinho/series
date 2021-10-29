<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estudio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'estudios';

    protected $fillable = [
        'nome',
        'slug',
    ];

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class, 'estudios_serie', 'estudio_id', 'serie_id');
    }
}
