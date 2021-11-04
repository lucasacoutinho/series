<?php

namespace App\Http\Requests\Serie;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;

class SerieUpdateRequest extends SerieDoc
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->titulo),
        ]);
    }

    public function rules()
    {
        return [
            'titulo'        => ['filled', 'string', 'min:5'],
            'slug'          => ['nullable', 'string', Rule::unique('series', 'slug')->ignore($this->serie)],
            'descricao'     => ['filled', 'string', 'min:5'],
            'image'         => ['filled', 'url'],
            'lancamento_at' => ['filled', 'date'],
            'status'        => [
                'filled', 'string', Rule::in([
                    Disponibilidade::STATUS_AVAILABLE,
                    Disponibilidade::STATUS_HIDDEN,
                    Disponibilidade::STATUS_DISABLED
                ])
            ],
            'categorias'    => ['filled', 'array'],
            'categorias.*'  => ['required', 'integer', Rule::exists('categorias', 'id')],
            'categorias_remover'   => ['filled', 'array'],
            'categorias_remover.*' => ['required', 'integer', Rule::exists('categorias', 'id')],
            'autores'       => ['filled', 'array'],
            'autores.*'     => ['required', 'integer', Rule::exists('autores', 'id')],
            'autores_remover'   => ['filled', 'array'],
            'autores_remover.*' => ['required', 'integer', Rule::exists('autores', 'id')],
            'estudios'      => ['filled', 'array'],
            'estudios.*'    => ['required', 'integer', Rule::exists('estudios', 'id')],
            'estudios_remover'   => ['filled', 'array'],
            'estudios_remover.*' => ['required', 'integer', Rule::exists('estudios', 'id')],
        ];
    }
}
