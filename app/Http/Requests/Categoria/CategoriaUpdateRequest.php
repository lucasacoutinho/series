<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;

class CategoriaUpdateRequest extends CategoriaDoc
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
            'titulo' => ['filled', 'string', 'min:5', Rule::unique('categorias', 'titulo')->ignore($this->categoria)],
            'slug'   => ['nullable', 'string', Rule::unique('categorias', 'slug')->ignore($this->categoria)],
            'status' => ['filled', 'string', Rule::in([Disponibilidade::STATUS_AVAILABLE, Disponibilidade::STATUS_HIDDEN, Disponibilidade::STATUS_DISABLED])]
        ];
    }
}
