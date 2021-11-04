<?php

namespace App\Http\Resources\Serie;

use App\Http\Resources\Autor\AutorResource;
use App\Http\Resources\Estudio\EstudioResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Categoria\CategoriaResource;

class SerieResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'titulo'     => $this->titulo,
            'descricao'  => $this->descricao,
            'image'      => $this->image,
            'slug'       => $this->slug,
            'lancamento_at' => $this->lancamento_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'categorias' => CategoriaResource::collection($this->categorias),
            'autores'    => AutorResource::collection($this->autores),
            'estudios'   => EstudioResource::collection($this->estudios),
        ];
    }
}
