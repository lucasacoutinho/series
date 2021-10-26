<?php

namespace App\Http\Controllers\Categorias;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domain\Permissoes\CategoriaPermissoes;
use App\Http\Resources\Categorias\CategoriaResource;
use App\Http\Requests\Categorias\CategoriaStoreRequest;
use App\Http\Requests\Categorias\CategoriaUpdateRequest;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

    public function store(CategoriaStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::STORE), 403);

        $categoria = Categoria::create($request->validated());

        return (new CategoriaResource($categoria))->response()->setStatusCode(201);
    }

    public function show(Categoria $categoria)
    {
        return (new CategoriaResource($categoria))->response()->setStatusCode(200);
    }

    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::UPDATE), 403);

        $categoria->update($request->validated());

        return (new CategoriaResource($categoria))->response()->setStatusCode(200);
    }

    public function destroy(Categoria $categoria)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::DESTROY), 403);

        $categoria->delete();

        return response()->json()->setStatusCode(200);
    }
}
