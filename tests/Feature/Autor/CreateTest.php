<?php

namespace Tests\Feature\Autor;

use Tests\TestCase;
use App\Models\User;
use App\Models\Autor;
use App\Models\Permission;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\AutorPermissoes;

class CreateTest extends TestCase
{
    private const ROTA  = 'autores.store';
    private const GUARD = 'api';

    public function test_pode_criar_autor(): void
    {
        $autor = Autor::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => AutorPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $autor);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'nome'       => $autor['nome'],
                'slug'       => Str::slug($autor['nome']),
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
            ]
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_autor_com_nome_duplicado(): void
    {
        $autor = Autor::factory()->create()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => AutorPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $autor);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(422);
    }

    public function test_nao_pode_criar_autor_sem_autenticar(): void
    {
        $autor = Autor::factory()->make()->toArray();

        $response = $this->postJson(route(self::ROTA), $autor);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_criar_autor_sem_permissao(): void
    {
        $autor = Autor::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $autor);

        $response->assertStatus(403);
    }
}
