<?php

namespace Tests\Feature\Categoria;

use Tests\TestCase;
use App\Models\Categoria;

class ShowTest extends TestCase
{
    private const ROTA = 'categorias.show';

    public function test_consegue_detalhar_categoria()
    {
        $categoria = Categoria::factory(1)->create()->first();

        $response = $this->getJson(route(self::ROTA, ['categoria' => $categoria]));

        $response->assertJsonFragment([
            'data' => [
                'id'         => $categoria->id,
                'slug'       => $categoria->slug,
                'titulo'     => $categoria->titulo,
                'created_at' => $categoria->created_at,
                'updated_at' => $categoria->updated_at,
            ]
        ])->assertStatus(200);
    }

    public function test_nao_encontra_categoria_inexistente()
    {
        $response = $this->getJson(route(self::ROTA,  ['categoria' => 1]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(404);
    }
}
