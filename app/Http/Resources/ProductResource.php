<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'unite_mesure' => $this->unite_mesure,
            'caisse' => $this->caisse,
            'nombre_bouteille' => $this->nombre_bouteille,
            'user_id' => $this->user_id,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
