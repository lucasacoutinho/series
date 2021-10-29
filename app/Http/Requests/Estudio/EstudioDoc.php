<?php

namespace App\Http\Requests\Estudio;

use Illuminate\Foundation\Http\FormRequest;

abstract class EstudioDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'nome' => [
                'description' => 'Nome do estudio',
                'example' => 'MAPPe',
            ]
        ];
    }
}
