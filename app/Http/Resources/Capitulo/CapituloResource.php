<?php

namespace App\Http\Resources\Capitulo;

use Illuminate\Http\Resources\Json\JsonResource;

class CapituloResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'capitulo'      => $this->capitulo,
            'titulo'        => $this->titulo,
            'slug'          => $this->slug,
            'descricao'     => $this->descricao,
            'link'          => $this->link,
            'status'        => $this->status,
            'lancamento_at' => $this->lancamento_at,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
