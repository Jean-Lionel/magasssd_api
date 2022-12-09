<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'pays' => $this->pays,
            'province' => $this->province,
            'commune' => $this->commune,
            'zone' => $this->zone,
            'colline' => $this->colline,
            'user_id' => $this->user_id,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
