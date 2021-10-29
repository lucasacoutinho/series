<?php

namespace App\Http\Resources\Estudio;

use Illuminate\Http\Resources\Json\JsonResource;

class EstudioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'slug' => $this->slug,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
