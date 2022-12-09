<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LotResource extends JsonResource
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
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price_unitaire' => $this->price_unitaire,
            'price_vente' => $this->price_vente,
            'date_created' => $this->date_created,
            'description' => $this->description,
            'softdeletes' => $this->softdeletes,
            'products' => ProductCollection::make($this->whenLoaded('products')),
        ];
    }
}
