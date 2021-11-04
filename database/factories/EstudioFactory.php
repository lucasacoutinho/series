<?php

namespace Database\Factories;

use App\Models\Estudio;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudioFactory extends Factory
{
    protected $model = Estudio::class;

    public function definition()
    {
        $nome = $this->faker->company();

        return [
            'nome' => $nome,
            'slug' => Str::slug($nome)
        ];
    }
}
