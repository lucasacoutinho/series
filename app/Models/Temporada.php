<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Temporada extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'temporadas';

    protected $fillable = [
        'temporada',
        'descricao',
        'serie_id',
        'status',
        'lancamento_at'
    ];

    protected $casts = [
        'temporada' => 'integer',
        'lancamento_at' => 'datetime'
    ];

    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    public function capitulos(): HasMany
    {
        return $this->hasMany(Capitulo::class, 'temporada_id', 'id');
    }
}
