<?php

namespace Tests\Feature\Categorias;

use Tests\TestCase;

class DestroyTest extends TestCase
{
    private const ROTA = 'categoria.destroy';

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
