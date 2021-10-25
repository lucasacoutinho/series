<?php

namespace Tests\Feature\Categorias;

use Tests\TestCase;
use App\Models\Categoria;

class IndexTest extends TestCase
{
    private const ROTA = 'categorias.index';

    public function test_consegue_listar_categorias()
    {
        Categoria::factory(20)->create();

        $response = $this->get(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'slug',
                    'titulo',
                    'created_at',
                    'updated_at'
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_sem_categorias_registradas()
    {
        $response = $this->get(route(self::ROTA));

        $response->assertJsonStructure([
            'data' => []
        ])->assertStatus(200);
    }
}
