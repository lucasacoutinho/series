<?php

namespace App\Http\Requests\Serie;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;

class SerieStoreRequest extends SerieDoc
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
            'titulo' => ['required', 'string', 'min:5'],
            'slug'   => ['required', 'string', Rule::unique('series', 'slug')],
            'descricao' => ['required', 'string', 'min:5'],
            'image'  => ['required', 'url'],
            'lancamento_at' => ['required', 'date'],
            'status' => [
                'required', 'string', Rule::in([
                    Disponibilidade::STATUS_AVAILABLE,
                    Disponibilidade::STATUS_HIDDEN,
                    Disponibilidade::STATUS_DISABLED
                ])
            ],
            'categorias' => ['filled', 'array'],
            'categorias.*' => ['required', 'integer', Rule::exists('categorias', 'id')],
            'autores' => ['filled', 'array'],
            'autores.*' => ['required', 'integer', Rule::exists('autores', 'id')],
            'estudios' => ['filled', 'array'],
            'estudios.*' => ['required', 'integer', Rule::exists('estudios', 'id')]
        ];
    }
}
