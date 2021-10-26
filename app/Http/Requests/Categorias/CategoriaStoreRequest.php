<?php

namespace App\Http\Requests\Categorias;

use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
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
            'titulo' => ['required', 'string'],
            'slug'   => ['required', 'string'],
            'status' => ['required', Rule::in([Categoria::STATUS_AVAILABLE, Categoria::STATUS_HIDDEN, Categoria::STATUS_DISABLED])]
        ];
    }
}
