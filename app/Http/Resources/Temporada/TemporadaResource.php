<?php

namespace App\Http\Resources\Temporada;

use Illuminate\Http\Resources\Json\JsonResource;

class TemporadaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'temporada'     => $this->temporada,
            'descricao'     => $this->descricao,
            'lancamento_at' => $this->lancamento_at,
            'status'        => $this->status,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
