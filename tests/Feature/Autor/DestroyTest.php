<?php

namespace Tests\Feature\Autor;

use Tests\TestCase;
use App\Models\User;
use App\Models\Autor;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\AutorPermissoes;

class DestroyTest extends TestCase
{
    private const ROTA  = 'autores.destroy';
    private const GUARD = 'api';

    public function test_pode_excluir_autores()
    {
        $autor = Autor::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => AutorPermissoes::DESTROY, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['autor' => $autor]));

        $response->assertJson([])->assertStatus(200);
    }

    public function test_nao_pode_excluir_autores_sem_autenticar()
    {
        $autor = Autor::factory()->create();

        $response = $this->deleteJson(route(self::ROTA, ['autor' => $autor]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_excluir_autores_sem_permissao()
    {
        $autor = Autor::factory()->create();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['autor' => $autor]));

        $response->assertStatus(403);
    }
}
