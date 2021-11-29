<?php

namespace App\Http\Requests\Temporada;

use Illuminate\Foundation\Http\FormRequest;

abstract class TemporadaDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'temporada' => [
                'description' => 'Número da temporada',
                'example' => '10',
            ],
            'descricao' => [
                'description' => 'Descrição da temporada',
                'example' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, maxime.',
            ],
            'lancamento_at' => [
                'description' => 'Data de lançamento da temporada',
                'example' => '2022-10-13',
            ],
            'status' => [
                'description' => 'Status da temporada',
                'example' => 'disponivel',
            ],
        ];
    }
}
