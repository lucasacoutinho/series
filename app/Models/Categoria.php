<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'titulo',
        'slug',
        'status',
    ];

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class, 'categorias_serie', 'categoria_id', 'serie_id');
    }
}
