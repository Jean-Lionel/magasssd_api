<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceptionResource extends JsonResource
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
            'montant' => $this->montant,
            'montant_total' => $this->montant_total,
            'tva' => $this->tva,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'stock_id' => $this->stock_id,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
