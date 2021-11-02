<?php

namespace App\Http\Requests\Temporada;

use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;
use Illuminate\Foundation\Http\FormRequest;

class TemporadaStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'temporada' => [
                'min:1',
                'required',
                'integer',
                Rule::unique('temporadas')->where('serie_id', $this->serie->id)->where(function ($query) {
                    return $query->where('status', Disponibilidade::STATUS_AVAILABLE);
                }),
            ],
            'descricao' => ['required', 'string', 'min:5'],
            'lancamento_at' => ['required', 'date'],
            'status' => [
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
