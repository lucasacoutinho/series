<?php

namespace Tests\Feature\Estudio;

use Tests\TestCase;
use App\Models\Estudio;

class IndexTest extends TestCase
{
    private const ROTA = 'estudios.index';

    public function test_consegue_listar_estudioss()
    {
        Estudio::factory(20)->create();

        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'nome',
                    'slug',
                    'created_at',
                    'updated_at'
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_sem_estudios_registrados()
    {
        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }
}
