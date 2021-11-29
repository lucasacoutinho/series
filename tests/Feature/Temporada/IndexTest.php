<?php

namespace Tests\Feature\Temporada;

use Tests\TestCase;
use App\Models\Serie;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;

class IndexTest extends TestCase
{
    private const ROTA = 'serie.temporadas.index';

    public function test_consegue_listar_temporadas_da_serie_disponiveis()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporadas = Temporada::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'temporada',
                    'descricao',
                    'lancamento_at',
                    'status',
                    'created_at',
                    'updated_at',
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_temporadas_da_serie_a_serem_lancadas()
    {
        $serie = Serie::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporadas = Temporada::factory(10)->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertStatus(403);
    }

    public function test_nao_consegue_listar_temporadas_de_serie_desabilitada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();
        Temporada::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertStatus(403);
    }

    public function test_nao_consegue_listar_temporadas_de_serie_oculta()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();
        Temporada::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertStatus(403);
    }

    public function test_nao_consegue_listar_temporadas_a_serem_lancadas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporadas = Temporada::factory(10)->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJsonFragment([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_temporadas_ocultas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporadas = Temporada::factory(10)->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJsonFragment([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_temporadas_desabilitadas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporadas = Temporada::factory(10)->state(['status' => Disponibilidade::STATUS_DISABLED])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJsonFragment([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_serie_nao_tem_temporadas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $response = $this->getJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJsonFragment([
            'data' => []
        ])->assertStatus(200);
    }
}
