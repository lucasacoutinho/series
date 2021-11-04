<?php

namespace Database\Factories;

use App\Models\Serie;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemporadaFactory extends Factory
{
    protected $model = Temporada::class;

    public function definition()
    {
        return [
            'temporada' => $this->faker->numberBetween(1, 10),
            'descricao' => $this->faker->text(200),
            'serie_id' => Serie::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement([
                Disponibilidade::STATUS_AVAILABLE,
                Disponibilidade::STATUS_HIDDEN,
                Disponibilidade::STATUS_DISABLED
            ]),
            'lancamento_at' => $this->faker->dateTimeBetween('-1 years', '+1 years')->format('Y-m-d H:i:s'),
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
