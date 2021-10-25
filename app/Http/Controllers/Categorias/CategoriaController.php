<?php

namespace App\Http\Controllers\Categorias;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domain\Permissoes\CategoriaPermissoes;
use App\Http\Resources\Categorias\CategoriaResource;

class CategoriaController extends Controller
{
    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

    public function store(Request $request)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::STORE), 403);

        $categoria = Categoria::create($request->validated());

        return (new CategoriaResource($categoria))->response()->setStatusCode(201);
    }

    public function show(Categoria $categoria)
    {
        //
    }

    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    public function destroy(Categoria $categoria)
    {
        //
    }
}
