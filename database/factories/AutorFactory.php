<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutorFactory extends Factory
{
    protected $model = Autor::class;

    public function definition()
    {
        $nome = $this->faker->firstName();

        return [
            'nome' => $nome,
            'slug' => Str::slug($nome),
        ];
    }
}
