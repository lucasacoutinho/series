<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Serie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'series';

    protected $fillable = [
        'titulo',
        'slug',
        'image',
        'descricao',
        'status',
        'lancamento_at'
    ];

    protected $casts = [
        'lancamento_at' => 'datetime'
    ];

    public function estudios(): BelongsToMany
    {
        return $this->belongsToMany(Estudio::class, 'estudios_serie', 'serie_id', 'estudio_id');
    }

    public function autores(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class, 'autores_serie', 'serie_id', 'autor_id');
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categorias_serie', 'serie_id', 'categoria_id');
    }

    public function temporadas(): HasMany
    {
        return $this->hasMany(Temporada::class, 'serie_id', 'id');
    }
}
