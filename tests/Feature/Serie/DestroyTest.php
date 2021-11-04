<?php

namespace Tests\Feature\Serie;

use Tests\TestCase;
use App\Models\User;
use App\Models\Serie;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\SeriePermissoes;

class DestroyTest extends TestCase
{
    private const ROTA  = 'series.destroy';
    private const GUARD = 'api';

    public function test_pode_excluir_series()
    {
        $serie = Serie::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::DESTROY, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJson([])->assertStatus(200);
    }

    public function test_nao_pode_excluir_series_sem_autenticar()
    {
        $serie = Serie::factory()->create();

        $response = $this->deleteJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_excluir_series_sem_permissao()
    {
        $serie = Serie::factory()->create();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['serie' => $serie]));

        $response->assertStatus(403);
    }
}
