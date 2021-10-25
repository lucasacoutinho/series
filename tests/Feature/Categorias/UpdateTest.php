<?php

namespace Tests\Feature\Categorias;

use Tests\TestCase;

class UpdateTest extends TestCase
{
    private const ROTA = 'categoria.update';

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
