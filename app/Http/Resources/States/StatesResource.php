<?php

namespace App\Http\Resources\States;

use Illuminate\Http\Resources\Json\JsonResource;

class StatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'stateId'   => $this->id,
            'name'      => $this->name,
            'uf'        => $this->uf,
        ];
    }
}
