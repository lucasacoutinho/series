<?php

namespace Tests\Feature\Categoria;

use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Permission;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\CategoriaPermissoes;

class CreateTest extends TestCase
{
    private const ROTA  = 'categorias.store';
    private const GUARD = 'api';

    public function test_pode_criar_categoria(): void
    {
        $categoria = Categoria::factory()->make()->toArray();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => CategoriaPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $categoria);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'titulo'     => $categoria['titulo'],
                'slug'       => Str::slug($categoria['titulo']),
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
            ]
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_categoria_sem_autenticar(): void
    {
        $categoria = Categoria::factory()->make()->toArray();

        $response = $this->postJson(route(self::ROTA), $categoria);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_criar_categoria_sem_permissao(): void
    {
        $categoria = Categoria::factory()->make()->toArray();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $categoria);

        $response->assertStatus(403);
    }
}
