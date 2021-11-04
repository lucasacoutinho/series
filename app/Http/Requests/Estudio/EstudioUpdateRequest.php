<?php

namespace App\Http\Requests\Estudio;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EstudioUpdateRequest extends EstudioDoc
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->nome),
        ]);
    }

    public function rules()
    {
        return [
            'nome' => ['filled', 'string', 'min:2', Rule::unique('estudios', 'nome')->ignore($this->estudio)],
            'slug' => ['nullable', 'string', Rule::unique('estudios', 'slug')->ignore($this->estudio)]
        ];
    }
}
