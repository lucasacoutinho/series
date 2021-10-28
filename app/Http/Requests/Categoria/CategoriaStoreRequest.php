<?php

namespace App\Http\Requests\Categoria;

use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'titulo' => ['required', 'string', 'min:5'],
            'slug'   => ['required', 'string', Rule::unique('categorias', 'slug')],
            'status' => ['required', 'string', Rule::in([Categoria::STATUS_AVAILABLE, Categoria::STATUS_HIDDEN, Categoria::STATUS_DISABLED])]
        ];
    }
}
