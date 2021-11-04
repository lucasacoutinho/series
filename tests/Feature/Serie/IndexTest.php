<?php

namespace Tests\Feature\Serie;

use Tests\TestCase;
use App\Models\Autor;
use App\Models\Serie;
use App\Models\Estudio;
use App\Models\Categoria;
use Domain\Status\Disponibilidade;

class IndexTest extends TestCase
{
    private const ROTA = 'series.index';

    public function test_consegue_listar_series_com_categorias()
    {
        $series = Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $categorias = Categoria::factory(10)->create();

        foreach ($series as $serie) {
            $serie->categorias()->attach($categorias->random(rand(1, 3)));
        }

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'descricao',
                    'image',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                    'categorias' => [
                        [
                            'id',
                            'titulo',
                            'slug',
                            'created_at',
                            'updated_at',
                        ],
                    ],
                    'autores'    => [],
                    'estudios'   => []
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_consegue_listar_series_sem_categorias()
    {
        Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'descricao',
                    'image',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                    'categorias' => [],
                    'autores'    => [],
                    'estudios'   => []
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_consegue_listar_series_com_autores()
    {
        $series = Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $autores = Autor::factory(10)->create();

        foreach ($series as $serie) {
            $serie->autores()->attach($autores->random(rand(1, 3)));
        }

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'descricao',
                    'image',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                    'categorias' => [],
                    'autores' => [
                        [
                            'id',
                            'nome',
                            'slug',
                            'created_at',
                            'updated_at',
                        ],
                    ],
                    'estudios' => []
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_consegue_listar_series_sem_autores()
    {
        Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'descricao',
                    'image',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                    'categorias' => [],
                    'autores'    => [],
                    'estudios'   => []
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_consegue_listar_series_com_estudios()
    {
        $series = Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $estudios = Estudio::factory(10)->create();

        foreach ($series as $serie) {
            $serie->estudios()->attach($estudios->random(rand(1, 3)));
        }

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'descricao',
                    'image',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                    'categorias' => [],
                    'autores' => [],
                    'estudios' => [
                        [
                            'id',
                            'nome',
                            'slug',
                            'created_at',
                            'updated_at',
                        ],
                    ]
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_consegue_listar_series_sem_estudios()
    {
        Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'descricao',
                    'image',
                    'lancamento_at',
                    'created_at',
                    'updated_at',
                    'categorias' => [],
                    'autores'    => [],
                    'estudios'   => []
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_series_nao_lancadas()
    {
        Serie::factory(10)->dateAfterNow()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_series_indisponiveis()
    {
        Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_DISABLED])->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_nao_consegue_listar_series_ocultas()
    {
        Serie::factory(10)->dateBeforeNow()->state(['status' => Disponibilidade::STATUS_HIDDEN])->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }

    public function test_sem_series_registradas()
    {
        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }
}
