<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_AVAILABLE = 'disponivel';
    public const STATUS_HIDDEN    = 'oculta';
    public const STATUS_DISABLED  = 'desabilitada';

    protected $table = 'categorias';

    protected $fillable = [
        'titulo',
        'slug',
        'status',
    ];
}
