<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    private const ROTA              = 'auth.login';
    private const EMAIL             = 'teste@gmail.com';
    private const PASSWORD          = 'senha123';
    private const PASSWORD_ERRADO   = 'senha1234';

    public function test_consegue_autenticar_com_sucesso()
    {
        $usuario = User::factory()->state(['email' => self::EMAIL, 'password' => Hash::make(self::PASSWORD)])->create();

        $response = $this->postJson(route(self::ROTA), [
            'email'    => self::EMAIL,
            'password' => self::PASSWORD,
        ]);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ])->assertStatus(200);
    }

    public function test_nao_consegue_autenticar_com_senha_invalido()
    {
        $usuario = User::factory()->state(['email' => self::EMAIL, 'password' => Hash::make(self::PASSWORD)])->create();

        $response = $this->postJson(route(self::ROTA), [
            'email'    => self::EMAIL,
            'password' => self::PASSWORD_ERRADO,
        ]);

        $response->assertJsonFragment([
            'error' => 'Unauthorized'
        ])->assertStatus(401);
    }

    public function test_nao_consegue_autenticar_sem_credenciais_email()
    {
        $response = $this->postJson(route(self::ROTA), [
            'email'    => null,
            'password' => self::PASSWORD,
        ]);

        $response->assertJsonValidationErrors(['email'])->assertStatus(422);
    }

    public function test_nao_consegue_autenticar_sem_credenciais_senha()
    {
        $response = $this->postJson(route(self::ROTA), [
            'email'    => self::EMAIL,
            'password' => null,
        ]);

        $response->assertJsonValidationErrors(['password'])->assertStatus(422);
    }
}
