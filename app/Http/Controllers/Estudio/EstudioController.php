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

    public function index()
    {
        return EstudioResource::collection(Estudio::all());
    }

    public function store(EstudioStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(EstudioPermissoes::STORE), 403);

        $estudio = Estudio::create($request->validated());

        return (new EstudioResource($estudio))->response()->setStatusCode(201);
    }

    public function show(Estudio $estudio)
    {
        return (new EstudioResource($estudio))->response()->setStatusCode(200);
    }

    public function update(EstudioUpdateRequest $request, Estudio $estudio)
    {
        abort_unless(authenticatedUserHasPermission(EstudioPermissoes::UPDATE), 403);

        $estudio->update($request->validated());

        return (new EstudioResource($estudio))->response()->setStatusCode(200);
    }

    public function destroy(Estudio $estudio)
    {
        abort_unless(authenticatedUserHasPermission(EstudioPermissoes::DESTROY), 403);

        $estudio->delete();

        return response()->json()->setStatusCode(200);
    }
}
