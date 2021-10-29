<?php

namespace Tests\Feature\Serie;

use Tests\TestCase;
use App\Models\User;
use App\Models\Autor;
use App\Models\Serie;
use App\Models\Estudio;
use App\Models\Categoria;
use App\Models\Permission;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\SeriePermissoes;

class UpdateTest extends TestCase
{
    private const ROTA  = 'series.update';
    private const GUARD = 'api';

    public function test_pode_atualizar_serie()
    {
        $serie = Serie::factory()->create();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = Serie::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $serie->id,
                'titulo'     => $dados['titulo'],
                'slug'       => $dados['slug'],
                'descricao'  => $dados['descricao'],
                'image'      => $dados['image'],
                'lancamento_at' => $dados['lancamento_at'],
                'created_at' => $serie->created_at,
                'updated_at' => $response['data']['updated_at'],
                'categorias' => [],
                'autores'    => [],
                'estudios'   => []
            ]
        ])->assertStatus(200);
    }

    public function test_pode_adicionar_categorias_na_serie()
    {
        $serie = Serie::factory()->create();
        $categorias = Categoria::factory(3)->create();
        $serie->categorias()->attach($categorias->random(3));

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = ['categorias' => Categoria::factory(2)->create()->pluck('id')->flatten()->all()];

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'descricao',
                'image',
                'lancamento_at',
                'created_at',
                'updated_at',
                'categorias' => [
                    ['id'],
                    ['id'],
                    ['id'],
                    ['id'],
                    ['id'],
                ],
                'autores' => [],
                'estudios' => []
            ]
        ])->assertStatus(200);
    }

    public function test_pode_remover_categorias_da_serie()
    {
        $serie = Serie::factory()->create();
        $categorias = Categoria::factory(3)->create();
        $serie->categorias()->attach($categorias->random(3));

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = ['categorias_remover' => $serie->categorias()->get()->random(2)->pluck('id')->flatten()->all()];

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'descricao',
                'image',
                'lancamento_at',
                'created_at',
                'updated_at',
                'categorias' => [
                    ['id'],
                ],
            ]
        ])->assertStatus(200);
    }

    public function test_pode_adicionar_autores_na_serie()
    {
        $serie = Serie::factory()->create();
        $autores = Autor::factory(3)->create();
        $serie->autores()->attach($autores->random(3));

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = ['autores' => Autor::factory(2)->create()->pluck('id')->flatten()->all()];

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'descricao',
                'image',
                'lancamento_at',
                'created_at',
                'updated_at',
                'categorias' => [],
                'autores' => [
                    ['id'],
                    ['id'],
                    ['id'],
                    ['id'],
                    ['id'],
                ],
                'estudios' => []
            ]
        ])->assertStatus(200);
    }

    public function test_pode_remover_autores_da_serie()
    {
        $serie = Serie::factory()->create();
        $autores = Autor::factory(3)->create();
        $serie->autores()->attach($autores->random(3));

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = ['autores_remover' => $serie->autores()->get()->random(2)->pluck('id')->flatten()->all()];

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'descricao',
                'image',
                'lancamento_at',
                'created_at',
                'updated_at',
                'categorias' => [],
                'autores' => [
                    ['id'],
                ],
                'estudios' => []
            ]
        ])->assertStatus(200);
    }

    public function test_pode_adicionar_estudios_na_serie()
    {
        $serie = Serie::factory()->create();
        $estudios = Estudio::factory(3)->create();
        $serie->estudios()->attach($estudios->random(3));

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = ['estudios' => Estudio::factory(2)->create()->pluck('id')->flatten()->all()];

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'descricao',
                'image',
                'lancamento_at',
                'created_at',
                'updated_at',
                'categorias' => [],
                'autores' => [],
                'estudios' => [
                    ['id'],
                    ['id'],
                    ['id'],
                    ['id'],
                    ['id'],
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_pode_remover_estudios_da_serie()
    {
        $serie = Serie::factory()->create();
        $estudios = Estudio::factory(3)->create();
        $serie->estudios()->attach($estudios->random(3));

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::UPDATE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $dados = ['estudios_remover' => $serie->estudios()->get()->random(2)->pluck('id')->flatten()->all()];

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'titulo',
                'slug',
                'descricao',
                'image',
                'lancamento_at',
                'created_at',
                'updated_at',
                'categorias' => [],
                'autores' => [],
                'estudios' => [
                    ['id'],
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_nao_pode_atualizar_serie_sem_autenticar()
    {
        $serie = Serie::factory()->create();
        $dados = Serie::factory()->make()->toArray();

        $response = $this->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_atualizar_serie_sem_permissao()
    {
        $serie = Serie::factory()->create();

        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $dados = Serie::factory()->make()->toArray();

        $response = $this->withToken($token)->putJson(route(self::ROTA, ['serie' => $serie->id]), $dados);

        $response->assertStatus(403);
    }
}
