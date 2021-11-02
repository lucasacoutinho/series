<?php

namespace App\Http\Requests\Temporada;

use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;
use Illuminate\Foundation\Http\FormRequest;

class TemporadaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'temporada'     => [
                'filled',
                'min:1',
                'integer',
                Rule::unique('temporadas')->where('serie_id', $this->serie->id)->where(function ($query) {
                    return $query->where('status', Disponibilidade::STATUS_AVAILABLE);
                })->ignore($this->temporada),
            ],
            'descricao'     => ['filled', 'string', 'min:5'],
            'lancamento_at' => ['filled', 'date'],
            'status'        => [
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
