<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshTest extends TestCase
{
    private const ROTA = 'auth.refresh';

    public function test_consegue_gerar_token_com_sucesso()
    {
        $usuario = User::factory()->create();
        $token   = JWTAuth::fromUser($usuario);

        $response = $this->withToken($token)->postJson(route(self::ROTA));

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ])->assertStatus(200);
    }

    public function test_nao_consegue_gerar_token()
    {
        $response = $this->postJson(route(self::ROTA));

        $response->assertStatus(401);
    }
}
