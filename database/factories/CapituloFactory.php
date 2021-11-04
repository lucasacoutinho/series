<?php

namespace Database\Factories;

use App\Models\Capitulo;
use App\Models\Temporada;
use Illuminate\Support\Str;
use Domain\Status\Disponibilidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapituloFactory extends Factory
{
    protected $model = Capitulo::class;

    public function definition()
    {
        $titulo = $this->faker->sentences(3 , true);

        return [
            'capitulo'  => $this->faker->numberBetween(1, 10),
            'titulo'    => $titulo,
            'slug'      => Str::slug($titulo),
            'descricao' => $this->faker->text(200),
            'link'      => $this->faker->url(),
            'status'    => $this->faker->randomElement([
                Disponibilidade::STATUS_AVAILABLE,
                Disponibilidade::STATUS_HIDDEN,
                Disponibilidade::STATUS_DISABLED
            ]),
            'lancamento_at' => $this->faker->dateTimeBetween('-1 years', '+1 years')->format('Y-m-d H:i:s'),
            'temporada_id'  => Temporada::inRandomOrder()->first()->id,
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
