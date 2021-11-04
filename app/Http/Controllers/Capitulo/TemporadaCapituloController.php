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

    public function store(CapituloStoreRequest $request, Temporada $temporada)
    {
        abort_unless(authenticatedUserHasPermission(CapituloPermissoes::STORE), 403);

        $capitulo = $temporada->capitulos()->create($request->validated());

        return (new CapituloResource($capitulo))->response()->setStatusCode(201);
    }

    public function show(Temporada $temporada, Capitulo $capitulo)
    {
        abort_unless($temporada->status === Disponibilidade::STATUS_AVAILABLE, 404);
        abort_unless($temporada->lancamento_at <= now(), 404);
        abort_unless($capitulo->status === Disponibilidade::STATUS_AVAILABLE, 404);
        abort_unless($capitulo->lancamento_at <= now(), 404);

        return (new CapituloResource($capitulo))->response()->setStatusCode(200);
    }

    public function update(CapituloUpdateRequest $request, Temporada $temporada, Capitulo $capitulo)
    {
        abort_unless(authenticatedUserHasPermission(CapituloPermissoes::UPDATE), 403);

        $capitulo->update($request->validated());

        return (new CapituloResource($capitulo))->response()->setStatusCode(200);
    }

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
