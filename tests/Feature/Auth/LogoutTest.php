<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutTest extends TestCase
{
    private const ROTA = 'auth.logout';

    public function test_consegue_deslogar_com_sucesso()
    {
        $usuario = User::factory()->create();
        $token = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA));

        $response->assertStatus(200);
    }

    public function test_nao_consegue_deslogar_sem_token()
    {
        $response = $this->postJson(route(self::ROTA));

        $response->assertStatus(401);
    }
}
