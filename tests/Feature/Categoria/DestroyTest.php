<?php

namespace Tests\Feature\Categoria;

use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\CategoriaPermissoes;

class DestroyTest extends TestCase
{
    private const ROTA  = 'categorias.destroy';
    private const GUARD = 'api';

    public function test_pode_excluir_categorias()
    {
        $categoria = Categoria::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => CategoriaPermissoes::DESTROY, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['categoria' => $categoria->id]));

        $response->assertJson([])->assertStatus(200);
    }

    public function test_nao_pode_excluir_categorias_sem_autenticar()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->deleteJson(route(self::ROTA, ['categoria' => $categoria->id]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_excluir_categorias_sem_permissao()
    {
        $categoria = Categoria::factory()->create();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['categoria' => $categoria->id]));

        $response->assertStatus(403);
    }
}
