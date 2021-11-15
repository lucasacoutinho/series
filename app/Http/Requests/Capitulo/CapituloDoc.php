<?php

namespace App\Http\Requests\Capitulo;

use Illuminate\Foundation\Http\FormRequest;

abstract class CapituloDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'capitulo' => [
                'description' => 'Número do capitulo',
                'example' => '10',
            ],
            'titulo' => [
                'description' => 'Titulo do capitulo',
                'example' => 'O bom luar',
            ],
            'descricao' => [
                'description' => 'Descrição do capitulo',
                'example' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.',
            ],
            'link' => [
                'description' => 'Link do capitulo',
                'example' => 'https://www.examplo.com/capitulo-01',
            ],
            'lancamento_at' => [
                'description' => 'Data de lançamento do capitulo',
                'example' => '2022-10-13',
            ],
            'status' => [
                'description' => 'Status do capitulo',
                'example' => 'disponivel',
            ],
        ];
    }
}
