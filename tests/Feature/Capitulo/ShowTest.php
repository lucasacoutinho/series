<?php

namespace Tests\Feature\Capitulo;

use Tests\TestCase;
use App\Models\Serie;
use App\Models\Capitulo;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;

class ShowTest extends TestCase
{
    private const ROTA = 'temporada.capitulos.show';

    public function test_consegue_detalhar_capitulos_de_temporada_lancada()
    {
        $serie     = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulo  = Capitulo::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['temporada' => $temporada, 'capitulo' => $capitulo]));

        $response->assertJsonStructure([
            'data' => [
                'id',
                'capitulo',
                'titulo',
                'slug',
                'descricao',
                'link',
                'lancamento_at',
                'status',
                'created_at',
                'updated_at',
            ]
        ])->assertStatus(200);
    }

    public function test_nao_consegue_detalhar_capitulos_de_temporada_a_ser_lancada()
    {
        $serie = Serie::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulo  = Capitulo::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_capitulos_de_temporada_desabilitada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();
        $capitulo  = Capitulo::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_capitulos_de_temporada_oculta()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();
        $capitulo  = Capitulo::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_capitulos_nao_lancados_de_temporada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulo  = Capitulo::factory()->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_capitulos_indisponiveis_de_temporada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulo  = Capitulo::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();

        $response = $this->getJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }

    public function test_nao_consegue_detalhar_capitulos_ocultos_de_temporada()
    {
        $serie = Serie::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $temporada = Temporada::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulo  = Capitulo::factory()->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();

        $response = $this->getJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(404);
    }
}
