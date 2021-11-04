<?php

namespace Tests\Feature\Temporada;

use Tests\TestCase;
use App\Models\Serie;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;

class ShowTest extends TestCase
{
    private const ROTA = 'serie.temporadas.show';

    public function test_consegue_detalhar_temporadas_da_serie_disponiveis()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertJsonStructure([
            'data' => [
                'id',
                'temporada',
                'descricao',
                'lancamento_at',
                'status',
                'created_at',
                'updated_at',
            ]
        ])->assertStatus(200);
    }

    public function test_nao_consegue_detalhar_temporada_de_serie_a_ser_lancada()
    {
        $serie = Serie::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_de_serie_desabilitada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_de_serie_oculta()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_de_serie_a_ser_lancada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_da_serie_a_serem_lancadas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_ocultas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_listar_temporadas_desabilitadas()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_da_serie_inexistente()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => 2, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_temporadas_inexistente_de_serie()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();

        $response = $this->getJson(route(self::ROTA, ['serie' => $serie, 'temporada' => 2]));

        $response->assertStatus(404);
    }
}
