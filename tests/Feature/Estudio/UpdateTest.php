<?php

namespace Tests\Feature\Estudio;

use Tests\TestCase;
use App\Models\User;
use App\Models\Estudio;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\EstudioPermissoes;

class UpdateTest extends TestCase
{
    private const ROTA  = 'estudios.update';
    private const GUARD = 'api';

    public function test_pode_atualizar_estudios()
    {
        $estudio = Estudio::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => EstudioPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Estudio::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['estudio' => $estudio->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'nome',
                'slug',
                'created_at',
                'updated_at',
            ]
        ])->assertStatus(200);
    }

    public function test_nao_pode_atualizar_estudio_nome_duplicado()
    {
        $estudio = Estudio::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => EstudioPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Estudio::factory()->create()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['estudio' => $estudio->id]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_estudios_sem_autenticar()
    {
        $estudio = Estudio::factory()->create();
        $dados = Estudio::factory()->make()->toArray();

        $response = $this->putJson(route(self::ROTA, ['estudio' => $estudio->id]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_atualizar_estudios_sem_permissao()
    {
        $estudio = Estudio::factory()->create();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);
        
        $dados = Estudio::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['estudio' => $estudio->id]), $dados);

        $response->assertStatus(403);
    }
}
