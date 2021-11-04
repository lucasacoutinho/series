<?php

namespace Tests\Feature\Serie;

use Tests\TestCase;
use App\Models\Serie;
use Domain\Status\Disponibilidade;

class ShowTest extends TestCase
{
    private const ROTA = 'series.show';

    public function test_consegue_detalhar_serie()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create()->first();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie->id]));

        $response->assertJsonFragment([
            'data' => [
                'id'            => $serie->id,
                'titulo'        => $serie->titulo,
                'descricao'     => $serie->descricao,
                'image'         => $serie->image,
                'slug'          => $serie->slug,
                'lancamento_at' => $serie->lancamento_at,
                'created_at'    => $serie->created_at,
                'updated_at'    => $serie->updated_at,
                'categorias'    => [],
                'autores'       => [],
                'estudios'      => [],
            ]
        ])->assertStatus(200);
    }

    public function test_nao_consegue_detalhar_serie_nao_lancada()
    {
        $serie = Serie::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create()->first();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie->id]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_serie_indisponivel()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create()->first();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie->id]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_serie_oculta()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create()->first();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie->id]));

        $response->assertStatus(404);
    }

    public function test_nao_encontra_serie_inexistente()
    {
        $response = $this->getJson(route(self::ROTA,  ['serie' => 1]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(404);
    }
}
