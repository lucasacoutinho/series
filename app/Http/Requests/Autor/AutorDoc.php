<?php

namespace App\Http\Requests\Autor;

use Illuminate\Foundation\Http\FormRequest;

abstract class AutorDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'nome' => [
                'description' => 'Nome do autor',
                'example' => 'Gabriel H3rtz Seiscentos e Sessenta e Oito',
            ]
        ];
    }
}
