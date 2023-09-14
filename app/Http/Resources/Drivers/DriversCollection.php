<?php

namespace App\Http\Resources\Drivers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DriversCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    private $formattedCollection;

    public function __construct($resource)
    {
        $this->formattedCollection = DriversResource::class;

        parent::__construct($resource->all());
    }
    public function toArray($request)
    {
        return [
            'drivers' => $this->formattedCollection::collection($this->collection),
        ];
    }
}
