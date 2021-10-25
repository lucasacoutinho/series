<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        $titulo = $this->faker->text(85);

        return [
            'titulo' => $titulo,
            'slug'   => Str::slug($titulo),
            'status' => $this->faker->randomElement([Categoria::STATUS_AVAILABLE, Categoria::STATUS_HIDDEN, Categoria::STATUS_DISABLED]),
        ];
    }
}
