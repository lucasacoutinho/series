<?php

namespace Tests\Feature\Estudio;

use Tests\TestCase;
use App\Models\User;
use App\Models\Estudio;
use App\Models\Permission;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\EstudioPermissoes;

class CreateTest extends TestCase
{
    private const ROTA  = 'estudios.store';
    private const GUARD = 'api';

    public function test_pode_criar_estudio(): void
    {
        $estudio = Estudio::factory()->make()->toArray();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => EstudioPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $estudio);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'nome'       => $estudio['nome'],
                'slug'       => Str::slug($estudio['nome']),
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
            ]
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_estudio_com_nome_duplicado(): void
    {
        $estudio = Estudio::factory()->create()->toArray();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => EstudioPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $estudio);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(422);
    }

    public function test_nao_pode_criar_estudio_sem_autenticar(): void
    {
        $estudio = Estudio::factory()->make()->toArray();

        $response = $this->postJson(route(self::ROTA), $estudio);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_criar_estudio_sem_permissao(): void
    {
        $estudio = Estudio::factory()->make()->toArray();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $estudio);

        $response->assertStatus(403);
    }
}
