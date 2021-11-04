<?php

namespace App\Http\Requests\Capitulo;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;
use Illuminate\Foundation\Http\FormRequest;

class CapituloUpdateRequest extends FormRequest
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
            'capitulo'  => ['filled', 'min:1', 'integer'],
            'titulo'    => ['filled', 'string', 'min:5'],
            'slug'      => ['nullable', 'string', Rule::unique('capitulos', 'slug')->ignore($this->capitulo)],
            'descricao' => ['filled', 'string', 'min:5'],
            'link'      => ['filled', 'url'],
            'lancamento_at' => ['filled', 'date'],
            'status'    => [
                'filled',
                'string',
                Rule::in([
                    Disponibilidade::STATUS_AVAILABLE,
                    Disponibilidade::STATUS_HIDDEN,
                    Disponibilidade::STATUS_DISABLED
                ])
            ],
        ];
    }
}
