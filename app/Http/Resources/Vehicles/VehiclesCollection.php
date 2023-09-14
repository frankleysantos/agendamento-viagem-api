<?php

namespace App\Http\Resources\Vehicles;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VehiclesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    private $formattedCollection;

    public function __construct($resource, $_params = null)
    {
        $this->formattedCollection = VehiclesResource::class;
        parent::__construct($resource->all());
    }

    public function toArray($request)
    {
        return $this->formattedCollection::collection($this->collection);
        
    }
}
