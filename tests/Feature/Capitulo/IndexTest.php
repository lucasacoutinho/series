<?php

namespace Tests\Feature\Capitulo;

use Tests\TestCase;
use App\Models\Serie;
use App\Models\Capitulo;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;

class IndexTest extends TestCase
{
    private const ROTA = 'temporada.capitulos.index';

    public function test_consegue_listar_capitulos_de_temporada_disponiveis()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulos = Capitulo::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['temporada' => $temporada]));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'capitulo',
                    'titulo',
                    'slug',
                    'descricao',
                    'link',
                    'status',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_capitulos_de_temporada_nao_lancada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulos = Capitulo::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_listar_capitulos_de_temporada_indisponivel()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();
        $capitulos = Capitulo::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_listar_capitulos_de_temporada_oculta()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();
        $capitulos = Capitulo::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_temporada_nao_tem_capitulos()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['temporada' => $temporada]));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }
}
