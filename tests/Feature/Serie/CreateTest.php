<?php

namespace Tests\Feature\Serie;

use Tests\TestCase;
use App\Models\User;
use App\Models\Autor;
use App\Models\Serie;
use App\Models\Estudio;
use App\Models\Categoria;
use App\Models\Permission;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Domain\Permissoes\SeriePermissoes;

class CreateTest extends TestCase
{
    private const ROTA  = 'series.store';
    private const GUARD = 'api';

    public function test_pode_criar_series_sem_categorias_sem_autores_sem_estudios(): void
    {
        $serie = Serie::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'titulo'     => $serie['titulo'],
                'slug'       => Str::slug($serie['titulo']),
                'descricao'  => $serie['descricao'],
                'image'      => $serie['image'],
                'lancamento_at' => $serie['lancamento_at'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
                'categorias' => [],
                'autores'    => [],
                'estudios'   => [],
            ]
        ])->assertStatus(201);
    }

    public function test_pode_criar_series_com_categorias(): void
    {
        $serie = Serie::factory()->make()->toArray();
        $categorias = Categoria::factory(10)->create()->pluck('id')->flatten()->all();
        $serie['categorias'] = $categorias;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'titulo'     => $serie['titulo'],
                'slug'       => Str::slug($serie['titulo']),
                'descricao'  => $serie['descricao'],
                'image'      => $serie['image'],
                'lancamento_at' => $serie['lancamento_at'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
                'categorias' => $response['data']['categorias'],
                'autores'    => [],
                'estudios'   => [],
            ]
        ])->assertStatus(201);
    }

    public function test_pode_criar_series_com_autores(): void
    {
        $serie = Serie::factory()->make()->toArray();
        $autores = Autor::factory(10)->create()->pluck('id')->flatten()->all();
        $serie['autores'] = $autores;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'titulo'     => $serie['titulo'],
                'slug'       => Str::slug($serie['titulo']),
                'descricao'  => $serie['descricao'],
                'image'      => $serie['image'],
                'lancamento_at' => $serie['lancamento_at'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
                'categorias' => [],
                'autores'    => $response['data']['autores'],
                'estudios'   => [],
            ]
        ])->assertStatus(201);
    }

    public function test_pode_criar_series_com_estudios(): void
    {
        $serie = Serie::factory()->make()->toArray();
        $estudios = Estudio::factory(10)->create()->pluck('id')->flatten()->all();
        $serie['estudios'] = $estudios;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'titulo'     => $serie['titulo'],
                'slug'       => Str::slug($serie['titulo']),
                'descricao'  => $serie['descricao'],
                'image'      => $serie['image'],
                'lancamento_at' => $serie['lancamento_at'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
                'categorias' => [],
                'autores'    => [],
                'estudios'   => $response['data']['estudios'],
            ]
        ])->assertStatus(201);
    }

    public function test_pode_criar_series_com_categorias_com_autores_com_estudios(): void
    {
        $serie = Serie::factory()->make()->toArray();
        $categorias = Categoria::factory(10)->create()->pluck('id')->flatten()->all();
        $autores = Autor::factory(10)->create()->pluck('id')->flatten()->all();
        $estudios = Estudio::factory(10)->create()->pluck('id')->flatten()->all();
        $serie['categorias'] = $categorias;
        $serie['autores'] = $autores;
        $serie['estudios'] = $estudios;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertJsonFragment([
            'data' => [
                'id'         => $response['data']['id'],
                'titulo'     => $serie['titulo'],
                'slug'       => Str::slug($serie['titulo']),
                'descricao'  => $serie['descricao'],
                'image'      => $serie['image'],
                'lancamento_at' => $serie['lancamento_at'],
                'created_at' => $response['data']['created_at'],
                'updated_at' => $response['data']['updated_at'],
                'categorias' => $response['data']['categorias'],
                'autores'    => $response['data']['autores'],
                'estudios'   => $response['data']['estudios'],
            ]
        ])->assertStatus(201);
    }

    public function test_nao_pode_criar_serie_com_falha_validacao(): void
    {
        $serie = Serie::factory()->make()->toArray();
        $serie['titulo'] = null;

        $usuario = User::factory()->create();
        $permissao = Permission::create(['name' => SeriePermissoes::STORE, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertJsonValidationErrors(['titulo'])->assertStatus(422);
    }

    public function test_nao_pode_criar_serie_sem_autenticar(): void
    {
        $serie = Serie::factory()->make()->toArray();

        $response = $this->postJson(route(self::ROTA), $serie);

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_criar_serie_sem_permissao(): void
    {
        $serie = Serie::factory()->make()->toArray();

        $usuario = User::factory()->create();
        $token   = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA), $serie);

        $response->assertStatus(403);
    }
}
