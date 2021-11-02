<?php

namespace Tests\Feature\Temporada;

use Tests\TestCase;
use App\Models\User;
use App\Models\Serie;
use App\Models\Temporada;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\TemporadaPermissoes;

class DestroyTest extends TestCase
{
    private const ROTA  = 'serie.temporadas.destroy';
    private const GUARD = 'api';

    public function test_pode_excluir_estudios()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => TemporadaPermissoes::DESTROY, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['serie' => $serie->id, 'temporada' => $temporada->id]));

        $response->assertJson([])->assertStatus(200);
    }

    public function test_nao_pode_excluir_estudios_sem_autenticar()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();

        $response = $this->deleteJson(route(self::ROTA, ['serie' => $serie->id, 'temporada' => $temporada->id]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_excluir_estudios_sem_permissao()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['serie' => $serie->id, 'temporada' => $temporada->id]));

        $response->assertStatus(403);
    }
}
