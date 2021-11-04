<?php

namespace Tests\Feature\Temporada;

use Tests\TestCase;
use App\Models\User;
use App\Models\Serie;
use App\Models\Temporada;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\TemporadaPermissoes;

class UpdateTest extends TestCase
{
    private const ROTA  = 'serie.temporadas.update';
    private const GUARD = 'api';

    public function test_pode_atualizar_temporada()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => TemporadaPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Temporada::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]), $dados);

        $response->assertJsonFragment([
            'data' => [
                'id'            => $temporada->id,
                'temporada'     => $dados['temporada'],
                'descricao'     => $dados['descricao'],
                'lancamento_at' => $dados['lancamento_at'],
                'status'        => $dados['status'],
                'created_at'    => $temporada->created_at,
                'updated_at'    => $response['data']['updated_at'],
            ]
        ])->assertStatus(200);
    }

    public function test_nao_pode_atualizar_temporada_validacao()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => TemporadaPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Temporada::factory()->state(['status' => 'teste'])->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]), $dados);

        $response->assertJsonStructure(['message'])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_temporada_sem_autenticar()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $dados = Temporada::factory()->make()->toArray();

        $response = $this->putJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]), $dados);

        $response->assertJsonStructure(['message'])->assertStatus(401);
    }

    public function test_nao_pode_atualizar_temporada_sem_permissao()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $dados = Temporada::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie, 'temporada' => $temporada]), $dados);

        $response->assertStatus(403);
    }
}
