<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

abstract class CategoriaDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'titulo' => [
                'description' => 'Titulo da categoria',
                'example' => 'hentai',
            ],
            'status' => [
                'description' => 'Status da categoria',
                'example' => 'disponivel',
            ],
        ];
    }
}
