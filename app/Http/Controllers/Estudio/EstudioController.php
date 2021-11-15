<?php

namespace App\Http\Controllers\Estudio;

use App\Models\Estudio;
use App\Http\Controllers\Controller;
use Domain\Permissoes\EstudioPermissoes;
use App\Http\Resources\Estudio\EstudioResource;
use App\Http\Requests\Estudio\EstudioStoreRequest;
use App\Http\Requests\Estudio\EstudioUpdateRequest;

class EstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    /**
     * Listar estudios
     *
     * Retonar todos os registros do banco
     * @group Estudio
     * @responseFile response/estudio/Listar.json
     */
    public function index()
    {
        return EstudioResource::collection(Estudio::all());
    }

    /**
     * Criar estudio
     *
     * Cria uma novo estudio
     * @group Estudio
     * @responseFile 201 response/estudio/Detalhar.json
     * @responseFile 401 response/estudio/ValidarAutenticacao.json
     * @responseFile 403 response/estudio/ValidarPermissao.json
     * @responseFile 422 response/estudio/ValidarCriar.json
     */
    public function store(EstudioStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(EstudioPermissoes::STORE), 403);

        $estudio = Estudio::create($request->validated());

        return (new EstudioResource($estudio))->response()->setStatusCode(201);
    }

    /**
     * Detalhar estudio
     *
     * Retorna os dados do estudio
     * @group Estudio
     * @urlParam id integer required O ID do estudio.
     * @responseFile response/estudio/Detalhar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Estudio] 3"}
     */
    public function show(Estudio $estudio)
    {
        return (new EstudioResource($estudio))->response()->setStatusCode(200);
    }

    /**
     * Atualizar estudio
     *
     * Atualiza os dados do estudio
     * @group Estudio
     * @urlParam id integer required O ID do estudio.
     * @responseFile response/estudio/Detalhar.json
     * @responseFile 401 response/estudio/ValidarAutenticacao.json
     * @responseFile 403 response/estudio/ValidarPermissao.json
     * @responseFile 422 response/estudio/ValidarAtualizar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Estudio] 3"}
     */
    public function update(EstudioUpdateRequest $request, Estudio $estudio)
    {
        abort_unless(authenticatedUserHasPermission(EstudioPermissoes::UPDATE), 403);

        $estudio->update($request->validated());

        return (new EstudioResource($estudio))->response()->setStatusCode(200);
    }

    /**
     * Excluir estudio
     *
     * Exclui um estudio
     * @group Estudio
     * @urlParam id integer required O ID do estudio.
     * @responseFile 401 response/estudio/ValidarAutenticacao.json
     * @responseFile 403 response/estudio/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Estudio] 3"}
     */
    public function destroy(Estudio $estudio)
    {
        abort_unless(authenticatedUserHasPermission(EstudioPermissoes::DESTROY), 403);

        $estudio->delete();

        return response()->json()->setStatusCode(200);
    }
}
