<?php

namespace App\Http\Controllers\Categorias;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Domain\Permissoes\CategoriaPermissoes;
use App\Http\Resources\Categoria\CategoriaResource;
use App\Http\Requests\Categoria\CategoriaStoreRequest;
use App\Http\Requests\Categoria\CategoriaUpdateRequest;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    /**
     * Listar categorias
     *
     * Retonar todos os registros do banco
     * @group Categoria
     * @responseFile response/categoria/Listar.json
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

    /**
     * Criar categoria
     *
     * Cria uma nova categoria
     * @group Categoria
     * @responseFile 201 response/categoria/Detalhar.json
     * @responseFile 401 response/categoria/ValidarAutenticacao.json
     * @responseFile 403 response/categoria/ValidarPermissao.json
     * @responseFile 422 response/categoria/ValidarCriar.json
     */
    public function store(CategoriaStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::STORE), 403);

        $categoria = Categoria::create($request->validated());

        return (new CategoriaResource($categoria))->response()->setStatusCode(201);
    }

    /**
     * Detalhar categoria
     *
     * Retorna os dados da categoria
     * @group Categoria
     * @responseFile response/categoria/Detalhar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Categoria] 3"}
     */
    public function show(Categoria $categoria)
    {
        return (new CategoriaResource($categoria))->response()->setStatusCode(200);
    }

    /**
     * Atualizar categoria
     *
     * Atualiza os dados da categoria
     * @group Categoria
     * @urlParam categoria integer required O id da categoria
     * @responseFile response/categoria/Detalhar.json
     * @responseFile 401 response/categoria/ValidarAutenticacao.json
     * @responseFile 403 response/categoria/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Categoria] 3"}
     * @responseFile 422 response/categoria/ValidarAtualizar.json
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::UPDATE), 403);

        $categoria->update($request->validated());

        return (new CategoriaResource($categoria))->response()->setStatusCode(200);
    }

    /**
     * Excluir categoria
     *
     * Exclui uma categoria
     * @group Categoria
     * @urlParam categoria integer required O id da categoria
     * @responseFile 401 response/categoria/ValidarAutenticacao.json
     * @responseFile 403 response/categoria/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Categoria] 3"}
     */
    public function destroy(Categoria $categoria)
    {
        abort_unless(authenticatedUserHasPermission(CategoriaPermissoes::DESTROY), 403);

        $categoria->delete();

        return response()->json()->setStatusCode(200);
    }
}
