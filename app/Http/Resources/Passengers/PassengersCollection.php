<?php

namespace App\Http\Resources\Passengers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PassengersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    private $formattedCollection;

    public function __construct($resources)
    {
        $this->formattedCollection = PassengersResource::class;
        parent::__construct($resources->all());
    }
    
    public function toArray($request)
    {
        return $this->formattedCollection::collection($this->collection);
    }
}
