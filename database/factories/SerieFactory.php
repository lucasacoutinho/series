<?php

namespace Database\Factories;

use App\Models\Serie;
use Illuminate\Support\Str;
use Domain\Status\Disponibilidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class SerieFactory extends Factory
{
    protected $model = Serie::class;

    public function definition()
    {
        $titulo = $this->faker->text(85);

        return [
            'titulo' => $titulo,
            'slug'   => Str::slug($titulo),
            'descricao' => $this->faker->text(200),
            'image' => $this->faker->imageUrl(),
            'lancamento_at' => $this->faker->dateTimeBetween('-1 years', '+1 years')->format('Y-m-d H:i:s'),
            'status' => $this->faker->randomElement([Disponibilidade::STATUS_AVAILABLE, Disponibilidade::STATUS_HIDDEN, Disponibilidade::STATUS_DISABLED]),
        ];
    }

    public function dateBeforeNow()
    {
        return $this->state(function (array $attributes) {
            return array_merge($attributes, [
                'lancamento_at' => $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
            ]);
        });
    }

    public function dateAfterNow()
    {
        return $this->state(function (array $attributes) {
            return array_merge($attributes, [
                'lancamento_at' => $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d H:i:s'),
            ]);
        });
    }
}
