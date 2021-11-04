<?php

namespace App\Http\Requests\Autor;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AutorUpdateRequest extends AutorDoc
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
            'nome' => ['filled', 'string', 'min:2', Rule::unique('autores', 'nome')->ignore($this->autor)],
            'slug' => ['nullable', 'string', Rule::unique('autores', 'slug')->ignore($this->autor)]
        ];
    }
}
