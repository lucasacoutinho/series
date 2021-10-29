<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Domain\Status\Disponibilidade;

class CategoriaStoreRequest extends CategoriaDoc
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
            'titulo' => ['required', 'string', 'min:5', Rule::unique('categorias', 'titulo')],
            'slug'   => ['required', 'string', Rule::unique('categorias', 'slug')],
            'status' => [
                'required', 'string', Rule::in([
                    Disponibilidade::STATUS_AVAILABLE,
                    Disponibilidade::STATUS_HIDDEN,
                    Disponibilidade::STATUS_DISABLED
                ])
            ],
        ];
    }
}
