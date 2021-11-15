<?php

namespace App\Http\Controllers\Serie;

use App\Models\Serie;
use Domain\Status\Disponibilidade;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Domain\Permissoes\SeriePermissoes;
use App\Http\Resources\Serie\SerieResource;
use App\Http\Requests\Serie\SerieStoreRequest;
use App\Http\Requests\Serie\SerieUpdateRequest;

class SerieController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    /**
     * Listar series
     *
     * Retonar todos os registros do banco
     * @group Serie
     * @responseFile response/serie/Listar.json
     */
    public function index()
    {
        $series = Serie::with(['categorias', 'autores', 'estudios'])
                    ->where('lancamento_at', '<=', now())
                    ->where('status', Disponibilidade::STATUS_AVAILABLE)
                    ->get();

        return SerieResource::collection($series);
    }

    /**
     * Criar serie
     *
     * Cria uma nova serie
     * @group Serie
     * @responseFile 201 response/serie/Detalhar.json
     * @responseFile 401 response/serie/ValidarAutenticacao.json
     * @responseFile 403 response/serie/ValidarPermissao.json
     * @responseFile 422 response/serie/ValidarCriar.json
     */
    public function store(SerieStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(SeriePermissoes::STORE), 403);

        $serie = DB::transaction(function () use ($request) {
            $serie = Serie::create($request->validated());

            foreach ($request->input('categorias', []) as $categoria) {
                $serie->categorias()->attach($categoria);
            }

            foreach ($request->input('autores', []) as $autor) {
                $serie->autores()->attach($autor);
            }

            foreach ($request->input('estudios', []) as $estudio) {
                $serie->estudios()->attach($estudio);
            }

            return $serie;
        });

        return (new SerieResource($serie))->response()->setStatusCode(201);
    }

    /**
     * Detalhar serie
     *
     * Retorna os dados da serie
     * @group Serie
     * @urlParam serie integer required O ID da serie.
     * @responseFile response/serie/Detalhar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Serie] 3"}
     */
    public function show(Serie $serie)
    {
        abort_unless($serie->lancamento_at <= now(), 404);
        abort_unless($serie->status === Disponibilidade::STATUS_AVAILABLE, 404);

        $serie->load(['categorias', 'autores', 'estudios']);

        return (new SerieResource($serie))->response()->setStatusCode(200);
    }

    /**
     * Atualizar serie
     *
     * Atualiza os dados da serie
     * @group Serie
     * @urlParam serie integer required O ID da serie.
     * @responseFile response/serie/Detalhar.json
     * @responseFile 401 response/serie/ValidarAutenticacao.json
     * @responseFile 403 response/serie/ValidarPermissao.json
     * @responseFile 422 response/serie/ValidarAtualizar.json
     * @response 404 {"message": "No query results for model [App\\Models\\Serie] 3"}
     */
    public function update(SerieUpdateRequest $request, Serie $serie)
    {
        abort_unless(authenticatedUserHasPermission(SeriePermissoes::UPDATE), 403);

        DB::transaction(function () use ($request, $serie) {
            $serie->update($request->validated());

            foreach ($request->input('categorias', []) as $categoria) {
                $serie->categorias()->attach($categoria);
            }

            foreach ($request->input('categorias_remover', []) as $categoria) {
                $serie->categorias()->detach($categoria);
            }

            foreach ($request->input('autores', []) as $autor) {
                $serie->autores()->attach($autor);
            }

            foreach ($request->input('autores_remover', []) as $autor) {
                $serie->autores()->detach($autor);
            }

            foreach ($request->input('estudios', []) as $estudio) {
                $serie->estudios()->attach($estudio);
            }

            foreach ($request->input('estudios_remover', []) as $estudio) {
                $serie->estudios()->detach($estudio);
            }
        });

        return (new SerieResource($serie))->response()->setStatusCode(200);
    }

    /**
     * Excluir serie
     *
     * Exclui uma serie
     * @group Serie
     * @urlParam serie integer required O ID da serie.
     * @responseFile 401 response/serie/ValidarAutenticacao.json
     * @responseFile 403 response/serie/ValidarPermissao.json
     * @response 404 {"message": "No query results for model [App\\Models\\Serie] 3"}
     */
    public function destroy(Serie $serie)
    {
        abort_unless(authenticatedUserHasPermission(SeriePermissoes::DESTROY), 403);

        $serie->update([
            'status' => Disponibilidade::STATUS_DISABLED
        ]);

        $serie->delete();

        return response()->json()->setStatusCode(200);
    }
}
