<?php

namespace App\Http\Resources\Passengers;

use Illuminate\Http\Resources\Json\JsonResource;

class PassengersResource extends JsonResource
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
            'passengerId'   => $this->id,
            'passenger'     => $this->name,
            'telephone'     => $this->telephone,
            'cpf'           => $this->cpf,
            'email'         => $this->email
        ];
    }
}
