<?php

namespace Domain\Comandos\Permissoes;

use App\Models\Role;
use App\Models\User;
use Domain\Funcoes\Funcoes;

class AtribuirPermissaoAdministrador
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    private function usuario()
    {
        return User::findOrFail($this->id);
    }

    public function atribuir()
    {
        $this->usuario()->assignRole($this->getFuncaoAdministrador());
    }

    private function getFuncaoAdministrador()
    {
        return Role::query()->where('name', Funcoes::ADMINISTRADOR)->first();
    }
}
