<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsuarioTest extends TestCase
{
    private const ROTA = 'auth.me';

    public function test_consegue_recuperar_dados_do_usuario_com_sucesso()
    {
        $usuario = User::factory()->create();
        $token   = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA));

        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at'
        ])->assertStatus(200);
    }

    public function test_nao_pode_recuperar_dados_do_usuario_sem_autenticar()
    {
        $response = $this->postJson(route(self::ROTA));

        $response->assertStatus(401);
    }

}
