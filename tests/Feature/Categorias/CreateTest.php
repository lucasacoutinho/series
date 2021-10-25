<?php

namespace Tests\Feature\Categorias;

use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Permission;
use Illuminate\Support\Str;
use Domain\Permissoes\CategoriaPermissoes;

class CreateTest extends TestCase
{
    private const ROTA = 'categoria.store';

    public function test_pode_criar_categoria()
    {
        $categoria = Categoria::factory()->make()->toArray();
        $usuario = User::factory()->create();

        $usuario->givePermissionTo(CategoriaPermissoes::STORE);

        $response = $this->postJson(route(self::ROTA), $categoria);

        $response->assertJsonFragment([
            'data' => [
                'id'     => $response['data']['id'],
                'titulo' => $categoria['titulo'],
                'slug'   => Str::slug($categoria['titulo'])
            ]
        ])->assertStatus(201);
    }
}
