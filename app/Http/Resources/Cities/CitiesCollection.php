<?php

namespace App\Http\Resources\Cities;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CitiesCollection extends ResourceCollection
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
        $this->formattedCollection = CitiesResource::class;
        parent::__construct($resource);
    }
    public function toArray($request)
    {
        return  $this->formattedCollection::collection($this->collection);
    }
}
