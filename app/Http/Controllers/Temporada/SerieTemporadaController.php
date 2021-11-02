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

    public function index(Serie $serie)
    {
        abort_unless($serie->lancamento_at <= now(), 404);
        abort_unless($serie->status === Disponibilidade::STATUS_AVAILABLE, 404);

        $serie->load(['temporadas' => function ($query) {
            $query->where('status', Disponibilidade::STATUS_AVAILABLE)
                  ->where('lancamento_at', '<=', now())
                  ->orderBy('temporada', 'asc');
        }]);

        return TemporadaResource::collection($serie->temporadas);
    }

    public function store(Serie $serie, TemporadaStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(TemporadaPermissoes::STORE), 403);

        $temporada = $serie->temporadas()->create($request->validated());

        return (new TemporadaResource($temporada))->response()->setStatusCode(201);
    }

    public function show(Serie $serie, Temporada $temporada)
    {
        abort_unless($serie->lancamento_at <= now(), 404);
        abort_unless($serie->status === Disponibilidade::STATUS_AVAILABLE, 404);
        abort_unless($temporada->status === Disponibilidade::STATUS_AVAILABLE, 404);
        abort_unless($temporada->lancamento_at <= now(), 404);

        return (new TemporadaResource($temporada))->response()->setStatusCode(200);
    }

    public function update(TemporadaUpdateRequest $request, Serie $serie, Temporada $temporada)
    {
        abort_unless(authenticatedUserHasPermission(TemporadaPermissoes::UPDATE), 403);

        $temporada->update($request->validated());

        return (new TemporadaResource($temporada))->response()->setStatusCode(200);
    }

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
