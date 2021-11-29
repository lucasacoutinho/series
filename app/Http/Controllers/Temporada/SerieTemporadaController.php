<?php

namespace App\Http\Controllers\Temporada;

use App\Models\Serie;
use App\Models\Temporada;
use Domain\Status\Disponibilidade;
use App\Http\Controllers\Controller;
use Domain\Permissoes\TemporadaPermissoes;
use App\Http\Resources\Temporada\TemporadaResource;
use App\Http\Requests\Temporada\TemporadaStoreRequest;
use App\Http\Requests\Temporada\TemporadaUpdateRequest;

class SerieTemporadaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    /**
     * Listar as temporadas da serie
     *
     * Retonar todos os registros do banco
     * @group Temporada
     * @urlParam serie_id integer required O ID da serie.
     * @responseFile response/temporada/Listar.json
     */
    public function index(Serie $serie)
    {
        abort_unless($serie->lancamento_at <= now(), 403);
        abort_unless($serie->status === Disponibilidade::STATUS_AVAILABLE, 403);

        $serie->load(['temporadas' => function ($query) {
            $query->where('status', Disponibilidade::STATUS_AVAILABLE)
                  ->where('lancamento_at', '<=', now())
                  ->orderBy('temporada', 'asc');
        }]);

        return TemporadaResource::collection($serie->temporadas);
    }

    /**
     * Criar temporada
     *
     * Cria uma nova temporada
     * @group Temporada
     * @urlParam serie_id integer required O ID da serie.
     * @responseFile 201 response/temporada/Detalhar.json
     * @responseFile 403 response/temporada/ValidarPermissao.json
     * @responseFile 401 response/temporada/ValidarAutenticacao.json
     * @responseFile 422 response/temporada/ValidarCriar.json
     */
    public function store(TemporadaStoreRequest $request, Serie $serie)
    {
        abort_unless(authenticatedUserHasPermission(TemporadaPermissoes::STORE), 403);

        $temporada = $serie->temporadas()->create($request->validated());

        return (new TemporadaResource($temporada))->response()->setStatusCode(201);
    }

    /**
     * Detalhar temporada
     *
     * Retorna os dados da temporada
     * @group Temporada
     * @urlParam serie_id integer required O ID da serie.
     * @urlParam id integer required O ID do capitulo.
     * @responseFile response/temporada/Detalhar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Serie] 3"}
     * @response 404 {"message": "No query results for model [App\\Models\\Temporada] 3"}
     */
    public function show(Serie $serie, Temporada $temporada)
    {
        abort_unless($serie->lancamento_at <= now(), 403);
        abort_unless($serie->status === Disponibilidade::STATUS_AVAILABLE, 403);
        abort_unless($temporada->status === Disponibilidade::STATUS_AVAILABLE, 403);
        abort_unless($temporada->lancamento_at <= now(), 403);

        return (new TemporadaResource($temporada))->response()->setStatusCode(200);
    }

    /**
     * Atualizar temporada
     *
     * Atualiza os dados da temporada
     * @group Temporada
     * @urlParam serie_id integer required O ID da serie.
     * @urlParam id integer required O ID do capitulo.
     * @responseFile response/temporada/Detalhar.json
     * @responseFile 401 response/temporada/ValidarAutenticacao.json
     * @responseFile 403 response/temporada/ValidarPermissao.json
     * @responseFile 422 response/temporada/ValidarAtualizar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Serie] 3"}
     * @response 404 {"message": "No query results for model [App\\Models\\Temporada] 3"}
     */
    public function update(TemporadaUpdateRequest $request, Serie $serie, Temporada $temporada)
    {
        abort_unless(authenticatedUserHasPermission(TemporadaPermissoes::UPDATE), 403);

        $temporada->update($request->validated());

        return (new TemporadaResource($temporada))->response()->setStatusCode(200);
    }

    /**
     * Excluir temporada
     *
     * Exclui uma temporada
     * @group Temporada
     * @urlParam serie_id integer required O ID da serie.
     * @urlParam id integer required O ID do capitulo.
     * @responseFile 401 response/temporada/ValidarAutenticacao.json
     * @responseFile 403 response/temporada/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Serie] 3"}
     * @response 404 {"message": "No query results for model [App\\Models\\Temporada] 3"}
     */
    public function destroy(Serie $serie, Temporada $temporada)
    {
        abort_unless(authenticatedUserHasPermission(TemporadaPermissoes::DESTROY), 403);

        $temporada->update([
            'status' => Disponibilidade::STATUS_DISABLED,
        ]);

        $temporada->delete();

        return response()->json()->setStatusCode(200);
    }
}
