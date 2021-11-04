<?php

namespace App\Http\Requests\Serie;

use Illuminate\Foundation\Http\FormRequest;

abstract class SerieDoc extends FormRequest
{
    public function bodyParameters()
    {
        return [
            'titulo' => [
                'description' => 'Titulo da serie',
                'example' => 'Um ditador',
            ],

            'descricao' => [
                'description' => 'Titulo da serie',
                'example' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem.',
            ],

            'image' => [
                'description' => 'Imagem de cover da serie',
                'example' => 'https://i.picsum.photos/id/856/300/300.jpg?hmac=K6AeHs9gpB-QHPd5KecDYgrBll0Lq6Lh6nb_nsH2Cic',
            ],

            'lancamento_at' => [
                'description' => 'Data de lançamento da serie',
                'example' => '2022-10-04',
            ],

            'status' => [
                'description' => 'Status da serie',
            ],

            'categorias' => [
                'description' => 'Categorias da serie',
            ],

            'categorias.*' => [
                'description' => 'Codigo das categorias da serie',
            ],

            'autores' => [
                'description' => 'Autores da serie',
            ],

            'autores.*' => [
                'description' => 'Codigo dos autores da serie',
            ],

            'estudios' => [
                'description' => 'Estudios da serie',
            ],

            'estudios.*' => [
                'description' => 'Codigo dos estudios da serie',
            ],
        ];
    }
}
