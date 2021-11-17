<?php

namespace Tests\Feature\Comando\Permissoes;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Domain\Funcoes\Funcoes;

class AtribuirPermissaoAdministradorTest extends TestCase
{
    private const GUARD = 'api';

    public function test_permissao_atribuida_com_sucesso()
    {
        $usuario = User::factory()->create();
        $role    = Role::create(['name' => Funcoes::ADMINISTRADOR, 'guard_name' => self::GUARD]);

        $this->artisan('permissoes-administrador:atribuir', ['usuario_id' => $usuario->id])
            ->expectsOutput('Permissão de ' . Funcoes::ADMINISTRADOR . ' atribuída com sucesso ao usuário informado.')
            ->assertSuccessful();

        $this->assertDatabaseHas('model_has_roles', [
            'model_id'   => $usuario->id,
            'model_type' => get_class($usuario),
            'role_id'    => $role->id,
        ]);
    }

    public function teste_nao_e_possivel_administrar_permissao_usuario_inexistente()
    {
        $role    = Role::create(['name' => Funcoes::ADMINISTRADOR, 'guard_name' => self::GUARD]);

        $this->artisan('permissoes-administrador:atribuir', ['usuario_id' => 1])
            ->expectsOutput('Não foi possível atribuir a permissão de ' . Funcoes::ADMINISTRADOR. ' ao usuário informado.')
            ->assertFailed();

        $this->assertDatabaseMissing('model_has_roles', [
            'model_id'   => 1,
            'model_type' => User::class,
            'role_id'    => $role->id,
        ]);
    }
}
