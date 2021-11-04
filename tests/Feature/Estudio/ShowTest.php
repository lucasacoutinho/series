<?php

namespace Tests\Feature\Estudio;

use Tests\TestCase;
use App\Models\Estudio;

class ShowTest extends TestCase
{
    private const ROTA = 'estudios.show';

    public function test_consegue_detalhar_estudio()
    {
        $estudio = Estudio::factory(1)->create()->first();

        $response = $this->getJson(route(self::ROTA, ['estudio' => $estudio]));

        $response->assertJsonFragment([
            'data' => [
                'id'         => $estudio->id,
                'nome'       => $estudio->nome,
                'slug'       => $estudio->slug,
                'created_at' => $estudio->created_at,
                'updated_at' => $estudio->updated_at,
            ]
        ])->assertStatus(200);
    }

    public function test_nao_encontra_estudio_inexistente()
    {
        $response = $this->getJson(route(self::ROTA,  ['estudio' => 1]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(404);
    }
}
