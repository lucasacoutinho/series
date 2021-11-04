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

class DestroyTest extends TestCase
{
    private const ROTA  = 'temporada.capitulos.destroy';
    private const GUARD = 'api';

    public function test_pode_excluir_temporadas()
    {
        $serie     = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo  = Capitulo::factory()->create();

        $usuario   = User::factory()->create();
        $permissao = Permission::create(['name' => CapituloPermissoes::DESTROY, 'guard_name' => self::GUARD]);
        $usuario->givePermissionTo($permissao);
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertJson([])->assertStatus(200);
    }

    public function test_nao_pode_excluir_temporadas_sem_autenticar()
    {
        $serie     = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo  = Capitulo::factory()->create();


        $response = $this->deleteJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertJsonStructure([
            'message'
        ])->assertStatus(401);
    }

    public function test_nao_pode_excluir_temporadas_sem_permissao()
    {
        $serie     = Serie::factory()->create();
        $temporada = Temporada::factory()->create();
        $capitulo  = Capitulo::factory()->create();

        $usuario   = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->deleteJson(route(self::ROTA, ['capitulo' => $capitulo, 'temporada' => $temporada]));

        $response->assertStatus(403);
    }
}
