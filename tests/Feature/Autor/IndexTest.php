<?php

namespace Tests\Feature\Autor;

use Tests\TestCase;
use App\Models\Autor;

class IndexTest extends TestCase
{
    private const ROTA = 'autores.index';

    public function test_consegue_listar_autores()
    {
        Autor::factory(20)->create();

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

    public function test_sem_autores_registrados()
    {
        $response = $this->getJson(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }
}
