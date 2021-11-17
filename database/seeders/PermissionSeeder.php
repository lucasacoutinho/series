<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Domain\Funcoes\Funcoes;
use Illuminate\Database\Seeder;
use Domain\Permissoes\AutorPermissoes;
use Domain\Permissoes\SeriePermissoes;
use Domain\Permissoes\EstudioPermissoes;
use Domain\Permissoes\CapituloPermissoes;
use Domain\Permissoes\CategoriaPermissoes;
use Domain\Permissoes\TemporadaPermissoes;

class PermissionSeeder extends Seeder
{
    private const GUARD = 'api';

    public function run()
    {
        $this->criarPermissoes();
        $this->criarFuncoes();
    }

    private function criarFuncoes()
    {
        $this->criarFuncaoAdministrador();
    }

    private function criarFuncaoAdministrador()
    {
        $permissions = Permission::all();

        $administrador = Role::create([
            'name'       => Funcoes::ADMINISTRADOR,
            'guard_name' => self::GUARD,
        ]);

        $administrador->syncPermissions($permissions);
    }

    private function criarPermissoes()
    {
        $this->criarAutorPermissoes();
        $this->criarSeriePermissoes();
        $this->criarEstudioPermissoes();
        $this->criarCapituloPermissoes();
        $this->criarCategoriaPermissoes();
        $this->criarTemporadaPermissoes();
    }

    private function criarAutorPermissoes()
    {
        $permissoes = [
            AutorPermissoes::INDEX,
            AutorPermissoes::STORE,
            AutorPermissoes::UPDATE,
            AutorPermissoes::DESTROY,
        ];

        foreach ($permissoes as $permissao) {
            $this->criarPermissao($permissao);
        }
    }

    private function criarCapituloPermissoes()
    {
        $permissoes = [
            CapituloPermissoes::INDEX,
            CapituloPermissoes::STORE,
            CapituloPermissoes::UPDATE,
            CapituloPermissoes::DESTROY,
        ];

        foreach ($permissoes as $permissao) {
            $this->criarPermissao($permissao);
        }
    }

    private function criarCategoriaPermissoes()
    {
        $permissoes = [
            CategoriaPermissoes::INDEX,
            CategoriaPermissoes::STORE,
            CategoriaPermissoes::UPDATE,
            CategoriaPermissoes::DESTROY,
        ];

        foreach ($permissoes as $permissao) {
            $this->criarPermissao($permissao);
        }
    }

    private function criarEstudioPermissoes()
    {
        $permissoes = [
            EstudioPermissoes::INDEX,
            EstudioPermissoes::STORE,
            EstudioPermissoes::UPDATE,
            EstudioPermissoes::DESTROY,
        ];

        foreach ($permissoes as $permissao) {
            $this->criarPermissao($permissao);
        }
    }

    private function criarSeriePermissoes()
    {
        $permissoes = [
            SeriePermissoes::INDEX,
            SeriePermissoes::STORE,
            SeriePermissoes::UPDATE,
            SeriePermissoes::DESTROY,
        ];

        foreach ($permissoes as $permissao) {
            $this->criarPermissao($permissao);
        }
    }

    private function criarTemporadaPermissoes()
    {
        $permissoes = [
            TemporadaPermissoes::INDEX,
            TemporadaPermissoes::STORE,
            TemporadaPermissoes::UPDATE,
            TemporadaPermissoes::DESTROY,
        ];

        foreach ($permissoes as $permissao) {
            $this->criarPermissao($permissao);
        }
    }

    private function criarPermissao($name)
    {
        $permission = Permission::create([
            'name'       => $name,
            'guard_name' => self::GUARD,
        ]);

        return $permission;
    }
}
