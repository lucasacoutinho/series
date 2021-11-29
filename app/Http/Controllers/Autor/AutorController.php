<?php

namespace App\Http\Controllers\Autor;

use App\Models\Autor;
use App\Http\Controllers\Controller;
use Domain\Permissoes\AutorPermissoes;
use App\Http\Resources\Autor\AutorResource;
use App\Http\Requests\Autor\AutorStoreRequest;
use App\Http\Requests\Autor\AutorUpdateRequest;

class AutorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    /**
     * Listar autores
     *
     * Retonar todos os registros do banco
     * @group Autor
     * @responseFile response/autor/Listar.json
     */
    public function index()
    {
        return AutorResource::collection(Autor::all());
    }

    /**
     * Criar autor
     *
     * Cria uma novo autor
     * @group Autor
     * @responseFile 201 response/autor/Detalhar.json
     * @responseFile 401 response/autor/ValidarAutenticacao.json
     * @responseFile 403 response/autor/ValidarPermissao.json
     * @responseFile 422 response/autor/ValidarCriar.json
     */
    public function store(AutorStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(AutorPermissoes::STORE), 403);

        $autor = Autor::create($request->validated());

        return (new AutorResource($autor))->response()->setStatusCode(201);
    }

    /**
     * Detalhar autor
     *
     * Retorna os dados do autor
     * @group Autor
     * @urlParam autor integer required O ID do autor.
     * @responseFile response/autor/Detalhar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Autor] 3"}
     */
    public function show(Autor $autor)
    {
        return (new AutorResource($autor))->response()->setStatusCode(200);
    }

    /**
     * Atualizar autor
     *
     * Atualiza os dados do autor
     * @group Autor
     * @urlParam autor integer required O ID do autor.
     * @responseFile response/autor/Detalhar.json
     * @responseFile 401 response/autor/ValidarAutenticacao.json
     * @responseFile 403 response/autor/ValidarPermissao.json
     * @responseFile 422 response/autor/ValidarAtualizar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Autor] 3"}
     */
    public function update(AutorUpdateRequest $request, Autor $autor)
    {
        abort_unless(authenticatedUserHasPermission(AutorPermissoes::UPDATE), 403);

        $autor->update($request->validated());

        return (new AutorResource($autor))->response()->setStatusCode(200);
    }

    /**
     * Excluir autor
     *
     * Exclui um autor
     * @group Autor
     * @urlParam autor integer required O ID do autor.
     * @responseFile 401 response/autor/ValidarAutenticacao.json
     * @responseFile 403 response/autor/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Autor] 3"}
     */
    public function destroy(Autor $autor)
    {
        abort_unless(authenticatedUserHasPermission(AutorPermissoes::DESTROY), 403);

        $autor->delete();

        return response()->json()->setStatusCode(200);
    }
}
