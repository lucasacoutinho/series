<?php

namespace App\Http\Controllers\Serie;

use App\Models\Serie;
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

    public function index()
    {
        return SerieResource::collection(Serie::with(['categorias', 'autores', 'estudios'])->get());
    }

    public function store(SerieStoreRequest $request)
    {
        abort_unless(authenticatedUserHasPermission(SeriePermissoes::STORE), 403);

        $serie = DB::transaction(function () use ($request) {
            $serie = Serie::create([
                'titulo'        => $request->input('titulo'),
                'slug'          => $request->input('slug'),
                'image'         => $request->input('image'),
                'descricao'     => $request->input('descricao'),
                'status'        => $request->input('status'),
                'lancamento_at' => $request->input('lancamento_at'),
            ]);

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

    public function show(Serie $serie)
    {
        $serie->load(['categorias', 'autores', 'estudios']);

        return (new SerieResource($serie))->response()->setStatusCode(200);
    }

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

    public function destroy(Serie $serie)
    {
        abort_unless(authenticatedUserHasPermission(SeriePermissoes::DESTROY), 403);

        $serie->delete();

        return response()->json()->setStatusCode(200);
    }
}
