<?php

namespace Tests\Feature\Autor;

use Tests\TestCase;
use App\Models\Autor;

class ShowTest extends TestCase
{
    private const ROTA = 'autores.show';

    public function test_consegue_detalhar_autor()
    {
        $autor = Autor::factory(1)->create()->first();

        $response = $this->getJson(route(self::ROTA, ['autor' => $autor->id]));

        $response->assertJsonFragment([
            'data' => [
                'id'         => $autor->id,
                'nome'       => $autor->nome,
                'slug'       => $autor->slug,
                'created_at' => $autor->created_at,
                'updated_at' => $autor->updated_at,
            ]
        ])->assertStatus(200);
    }

    public function test_nao_encontra_autor_inexistente()
    {
        $response = $this->getJson(route(self::ROTA,  ['autor' => 1]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(404);
    }
}
