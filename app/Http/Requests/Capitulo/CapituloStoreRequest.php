<?php

namespace App\Http\Requests\Capitulo;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;
use Illuminate\Foundation\Http\FormRequest;

class CapituloStoreRequest extends FormRequest
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
            'capitulo'  => ['required', 'integer', 'min:1', Rule::unique('capitulos')->where('temporada_id', $this->temporada->id)->where(function ($query) {
                return $query->where('status', Disponibilidade::STATUS_AVAILABLE);
            }),],
            'titulo'    => ['required', 'string', 'min:5'],
            'slug'      => ['required', 'string', Rule::unique('capitulos', 'slug')],
            'descricao' => ['required', 'string', 'min:5'],
            'link'      => ['required', 'url'],
            'lancamento_at' => ['required', 'date'],
            'status'    => [
                'required',
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
