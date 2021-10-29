<?php

namespace Tests\Feature\Estudio;

use Tests\TestCase;
use App\Models\User;
use App\Models\Estudio;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\EstudioPermissoes;

class DestroyTest extends TestCase
{
    private const ROTA  = 'estudios.destroy';
    private const GUARD = 'api';

    public function test_pode_excluir_estudios()
    {
        $estudio = Estudio::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => EstudioPermissoes::DESTROY, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['estudio' => $estudio->id]));

        $response->assertJson([])->assertStatus(200);
    }

    public function test_nao_pode_excluir_estudios_sem_autenticar()
    {
        $estudio = Estudio::factory()->create();

        $response = $this->deleteJson(route(self::ROTA, ['estudio' => $estudio->id]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_excluir_estudios_sem_permissao()
    {
        $estudio = Estudio::factory()->create();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['estudio' => $estudio->id]));

        $response->assertStatus(403);
    }
}
