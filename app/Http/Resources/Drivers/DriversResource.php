<?php

namespace App\Http\Resources\Drivers;

use Illuminate\Http\Resources\Json\JsonResource;

class DriversResource extends JsonResource
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
            'driverId'      => $this->id,
            'driver'        => $this->name,
            'telephone'     => $this->telephone,
            'cnh_category'  => $this->cnh_category,
            'cnh_number'    => $this->cnh_number
        ];
    }
}
