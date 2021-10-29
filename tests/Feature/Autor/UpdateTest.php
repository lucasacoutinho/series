<?php

namespace Tests\Feature\Autor;

use Tests\TestCase;
use App\Models\User;
use App\Models\Autor;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\AutorPermissoes;

class UpdateTest extends TestCase
{
    private const ROTA  = 'autores.update';
    private const GUARD = 'api';

    public function test_pode_atualizar_autores()
    {
        $autor = Autor::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => AutorPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Autor::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['autor' => $autor->id]), $dados);

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

    public function test_nao_pode_atualizar_autor_nome_duplicado()
    {
        $autor = Autor::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => AutorPermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Autor::factory()->create()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['autor' => $autor->id]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(422);
    }

    public function test_nao_pode_atualizar_autor_sem_autenticar()
    {
        $autor = Autor::factory()->create();
        $dados = Autor::factory()->make()->toArray();

        $response = $this->putJson(route(self::ROTA, ['autor' => $autor->id]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_atualizar_autor_sem_permissao()
    {
        $autor = Autor::factory()->create();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $dados = Autor::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['autor' => $autor->id]), $dados);

        $response->assertStatus(403);
    }
}
