<?php

namespace Tests\Feature\Capitulo;

use Tests\TestCase;
use App\Models\User;
use App\Models\Serie;
use App\Models\Capitulo;
use App\Models\Temporada;
use App\Models\Permission;
use Domain\Status\Disponibilidade;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\CapituloPermissoes;

class CreateTest extends TestCase
{
    private const ROTA  = 'temporada.capitulos.store';
    private const GUARD = 'api';

    public function test_pode_criar_capitulo_de_temporada(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => CapituloPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['temporada' => $temporada]), $capitulo);

        $response->assertJsonFragment([
            'data' => [
                'id'        => $response['data']['id'],
                'capitulo'  => $capitulo['capitulo'],
                'titulo'    => $capitulo['titulo'],
                'slug'      => $capitulo['slug'],
                'descricao' => $capitulo['descricao'],
                'link'      => $capitulo['link'],
                'lancamento_at' => $capitulo['lancamento_at'],
                'status'     => $capitulo['status'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
            ],
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_capitulo_com_falha_validacao(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->make()->toArray();
        $capitulo['capitulo'] = 0;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => CapituloPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['temporada' => $temporada]), $capitulo);

        $response->assertJsonValidationErrors(['capitulo'])->assertStatus(422);
    }

    public function test_nao_pode_criar_capitulo_repetido(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create();
        $capitulo = Capitulo::factory()->state(['status' => Disponibilidade::STATUS_AVAILABLE])->create()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => CapituloPermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['temporada' => $temporada]), $capitulo);

        $response->assertJsonValidationErrors(['capitulo'])->assertStatus(422);
    }

    public function test_nao_pode_criar_capitulo_sem_autenticar(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->make()->toArray();

        $response = $this->postJson(route(self::ROTA, ['temporada' => $temporada]), $capitulo);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_criar_capitulo_sem_permissao(): void
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $token   = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA, ['temporada' => $temporada]), $capitulo);

        $response->assertStatus(403);
    }
}
