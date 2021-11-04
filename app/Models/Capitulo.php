<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capitulo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'capitulos';

    protected $fillable = [
        'capitulo',
        'titulo',
        'slug',
        'descricao',
        'link',
        'status',
        'lancamento_at',
        'temporada_id'
    ];

    protected $casts = [
        'capitulo' => 'integer',
        'lancamento_at' => 'datetime'
    ];

    public function temporadas(): BelongsTo
    {
        return $this->belongsTo(Temporada::class, 'temporada_id', 'id');
    }
}
