<?php

namespace App\Http\Controllers\Capitulo;

use App\Models\Capitulo;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;
use App\Http\Controllers\Controller;
use Domain\Permissoes\CapituloPermissoes;
use App\Http\Resources\Capitulo\CapituloResource;
use App\Http\Requests\Capitulo\CapituloStoreRequest;
use App\Http\Requests\Capitulo\CapituloUpdateRequest;

class TemporadaCapituloController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    /**
     * Listar os capitulos da temporada
     *
     * Retonar todos os registros do banco
     * @group Capitulo
     * @urlParam temporada_id integer required O ID da temporada.
     * @responseFile response/capitulo/Listar.json
     */
    public function index(Temporada $temporada)
    {
        abort_unless($temporada->lancamento_at <= now(), 404);
        abort_unless($temporada->status === Disponibilidade::STATUS_AVAILABLE, 404);

        $temporada->load(['capitulos' => function ($query) {
            $query->where('status', Disponibilidade::STATUS_AVAILABLE)
                  ->where('lancamento_at', '<=', now())
                  ->orderBy('capitulo', 'asc');
        }]);

        return CapituloResource::collection($temporada->capitulos);
    }

    /**
     * Criar capitulo
     *
     * Cria uma novo capitulo
     * @group Capitulo
     * @urlParam temporada_id integer required O ID da temporada.
     * @responseFile 201 response/capitulo/Detalhar.json
     * @responseFile 401 response/capitulo/ValidarAutenticacao.json
     * @responseFile 403 response/capitulo/ValidarPermissao.json
     * @responseFile 422 response/capitulo/ValidarCriar.json
     */
    public function store(CapituloStoreRequest $request, Temporada $temporada)
    {
        abort_unless(authenticatedUserHasPermission(CapituloPermissoes::STORE), 403);

        $capitulo = $temporada->capitulos()->create($request->validated());

        return (new CapituloResource($capitulo))->response()->setStatusCode(201);
    }

    /**
     * Detalhar capitulo
     *
     * Retorna os dados do capitulo
     * @group Capitulo
     * @responseFile response/capitulo/Detalhar.json
     * @urlParam temporada_id integer required O ID da temporada.
     * @urlParam id integer required O ID do capitulo.
     * @response 404 {"message": "No query results for model [App\\Models\\Temporada] 3"}
     * @response 404 {"message": "No query results for model [App\\Models\\Capitulo] 3"}
     */
    public function show(Temporada $temporada, Capitulo $capitulo)
    {
        abort_unless($temporada->status === Disponibilidade::STATUS_AVAILABLE, 404);
        abort_unless($temporada->lancamento_at <= now(), 404);
        abort_unless($capitulo->status === Disponibilidade::STATUS_AVAILABLE, 404);
        abort_unless($capitulo->lancamento_at <= now(), 404);

        return (new CapituloResource($capitulo))->response()->setStatusCode(200);
    }

    /**
     * Atualizar capitulo
     *
     * Atualiza os dados do capitulo
     * @group Capitulo
     * @urlParam temporada_id integer required O ID da temporada.
     * @urlParam id integer required O ID do capitulo.
     * @responseFile response/capitulo/Detalhar.json
     * @responseFile 401 response/capitulo/ValidarAutenticacao.json
     * @responseFile 403 response/capitulo/ValidarPermissao.json
     * @responseFile 422 response/capitulo/ValidarAtualizar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Temporada] 3"}
     * @response 404 {"message": "No query results for model [App\\Models\\Capitulo] 3"}
     */
    public function update(CapituloUpdateRequest $request, Temporada $temporada, Capitulo $capitulo)
    {
        abort_unless(authenticatedUserHasPermission(CapituloPermissoes::UPDATE), 403);

        $capitulo->update($request->validated());

        return (new CapituloResource($capitulo))->response()->setStatusCode(200);
    }

    /**
     * Excluir capitulo
     *
     * Exclui um capitulo
     * @group Capitulo
     * @urlParam temporada_id integer required O ID da temporada.
     * @urlParam id integer required O ID do capitulo.
     * @responseFile 401 response/capitulo/ValidarAutenticacao.json
     * @responseFile 403 response/capitulo/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Temporada] 3"}
     * @response 404 {"message": "No query results for model [App\\Models\\Capitulo] 3"}
     */
    public function destroy(Temporada $temporada, Capitulo $capitulo)
    {
        abort_unless(authenticatedUserHasPermission(CapituloPermissoes::DESTROY), 403);

        $capitulo->update([
            'status' => Disponibilidade::STATUS_DISABLED,
        ]);

        $capitulo->delete();

        return response()->json()->setStatusCode(200);
    }
}
