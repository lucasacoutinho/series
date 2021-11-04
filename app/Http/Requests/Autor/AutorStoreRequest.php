<?php

namespace App\Http\Requests\Autor;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AutorStoreRequest extends AutorDoc
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
            'nome' => ['required', 'string', 'min:2', Rule::unique('autores', 'nome')],
            'slug' => ['required', 'string', Rule::unique('autores', 'slug')]
        ];
    }
}
