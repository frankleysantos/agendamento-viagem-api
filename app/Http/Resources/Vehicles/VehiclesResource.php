<?php

namespace App\Http\Resources\Vehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class VehiclesResource extends JsonResource
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
            'vehicleId'     => $this->id,
            'vehicle'       => $this->name,
            'plate'         => $this->plate,
            'year'          => $this->year,
            'color'         => $this->cor,
            'description'   => $this->description,
            'totalCapacity' => $this->total_capacity,
            'mileage'       => $this->mileageCar
        ];
        
    }
}
