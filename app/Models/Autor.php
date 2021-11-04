<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'autores';

    protected $fillable = [
        'nome',
        'slug'
    ];

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class, 'autores_serie', 'autor_id', 'serie_id');
    }
}
