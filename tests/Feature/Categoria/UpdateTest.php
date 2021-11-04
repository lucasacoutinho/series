<?php

namespace Tests\Feature\Categoria;

use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\CategoriaPermissoes;

class UpdateTest extends TestCase
{
    private const ROTA  = 'categorias.update';
    private const GUARD = 'api';

    public function test_pode_atualizar_categorias()
    {
        $categoria = Categoria::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => CategoriaPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Categoria::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['categoria' => $categoria]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'created_at',
                'updated_at',
            ]
        ])->assertStatus(200);
    }

    public function test_pode_atualizar_categoria_titulo_duplicado()
    {
        $categoria = Categoria::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => CategoriaPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Categoria::factory()->create()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['categoria' => $categoria]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_categorias_sem_autenticar()
    {
        $categoria = Categoria::factory()->create();
        $dados = Categoria::factory()->make()->toArray();

        $response = $this->putJson(route(self::ROTA, ['categoria' => $categoria]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_atualizar_categorias_sem_permissao()
    {
        $categoria = Categoria::factory()->create();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $dados = Categoria::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['categoria' => $categoria]), $dados);

        $response->assertStatus(403);
    }
}
