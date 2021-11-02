<?php

namespace Tests\Feature\Temporada;

use Tests\TestCase;
use App\Models\User;
use App\Models\Serie;
use App\Models\Temporada;
use App\Models\Permission;
use Domain\Status\Disponibilidade;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\TemporadaPermissoes;

class CreateTest extends TestCase
{
    private const ROTA  = 'serie.temporadas.store';
    private const GUARD = 'api';

    public function test_pode_criar_temporada_de_serie(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => TemporadaPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['serie' => $serie]), $temporada);

        $response->assertJsonFragment([
            'data' => [
                'id' => $response['data']['id'],
                'temporada' => $temporada['temporada'],
                'descricao' => $temporada['descricao'],
                'lancamento_at' => $temporada['lancamento_at'],
                'status' => $temporada['status'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
            ],
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_temporada_com_falha_validacao(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->make()->toArray();
        $temporada['temporada'] = 0;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => TemporadaPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['serie' => $serie]), $temporada);

        $response->assertJsonValidationErrors(['temporada'])->assertStatus(422);
    }

    public function test_nao_pode_criar_temporada_repetida(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => TemporadaPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['serie' => $serie]), $temporada);

        $response->assertJsonValidationErrors(['temporada'])->assertStatus(422);
    }

    public function test_nao_pode_criar_temporada_sem_autenticar(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->make()->toArray();

        $response = $this->postJson(route(self::ROTA, ['serie' => $serie]), $temporada);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_criar_temporada_sem_permissao(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $token   = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['serie' => $serie]), $temporada);

        $response->assertStatus(403);
    }
}
