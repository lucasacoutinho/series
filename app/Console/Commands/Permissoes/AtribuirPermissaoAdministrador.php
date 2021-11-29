<?php

namespace App\Console\Commands\Permissoes;

use Throwable;
use Domain\Funcoes\Funcoes;
use Illuminate\Console\Command;
use Domain\Comandos\Permissoes\AtribuirPermissaoAdministrador as Permissao;

class AtribuirPermissaoAdministrador extends Command
{
    protected $signature = 'permissoes-administrador:atribuir {usuario_id}';

    protected $description = 'Atribui permissões de administrador ao usuário informado';

    public function handle()
    {
        $usuario_id = $this->argument('usuario_id');

        try {
            (new Permissao($usuario_id))->atribuir();
            $this->info('Permissão de ' . Funcoes::ADMINISTRADOR . ' atribuída com sucesso ao usuário informado.');

            return Command::SUCCESS;
        } catch (Throwable $e) {
            $this->error('Não foi possível atribuir a permissão de ' . Funcoes::ADMINISTRADOR. ' ao usuário informado.');

            return Command::FAILURE;
        }
    }
}
