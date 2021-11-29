<?php

namespace Tests\Feature\Capitulo;

use Tests\TestCase;
use App\Models\User;
use App\Models\Serie;
use App\Models\Capitulo;
use App\Models\Temporada;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\CapituloPermissoes;

class UpdateTest extends TestCase
{
    private const ROTA  = 'temporada.capitulos.update';
    private const GUARD = 'api';

    public function test_pode_atualizar_temporada()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => CapituloPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Capitulo::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, [
            'temporada' => $temporada,
            'capitulo' => $capitulo
        ]), $dados);

        $response->assertJsonFragment([
            'data' => [
                'id'        => $capitulo->id,
                'capitulo'  => $dados['capitulo'],
                'titulo'    => $dados['titulo'],
                'slug'      => $dados['slug'],
                'descricao' => $dados['descricao'],
                'link'      => $dados['link'],
                'lancamento_at' => $dados['lancamento_at'],
                'status'     => $dados['status'],
                'created_at' => $capitulo->created_at,
                'updated_at' => $response['data']['updated_at'],
            ]
        ])->assertStatus(200);
    }

    public function test_nao_pode_atualizar_capitulo_validacao()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => CapituloPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Capitulo::factory()->state(['status' => 'teste'])->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, [
            'temporada' => $temporada,
            'capitulo' => $capitulo
        ]), $dados);

        $response->assertJsonStructure(['message'])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_capitulo_sem_autenticar()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->create();

        $dados = Capitulo::factory()->make()->toArray();

        $response = $this->putJson(route(self::ROTA, [
            'temporada' => $temporada,
            'capitulo' => $capitulo
        ]), $dados);

        $response->assertJsonStructure(['message'])->assertStatus(401);
    }

    public function test_nao_pode_atualizar_capitulo_sem_permissao()
    {
        $serie = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo = Capitulo::factory()->create();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $dados = Capitulo::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, [
            'temporada' => $temporada,
            'capitulo' => $capitulo
        ]), $dados);

        $response->assertStatus(403);
    }
}
