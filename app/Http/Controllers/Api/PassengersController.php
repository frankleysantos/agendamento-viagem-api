<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Passengers\PassengersCollection;
use App\Http\Resources\Passengers\PassengersResource;
use App\Repositories\PassengersRepository;
use Illuminate\Http\Request;

class PassengersController extends Controller
{
    private $passengersRepository;

    public function __construct(PassengersRepository $passengersRepository)
    {
        $this->passengersRepository = $passengersRepository;
    }

    public function storeOrUpdate(Request $request)
    {
        $passenger = $this->passengersRepository->storeOrUpdate($request);
        return response()->json($passenger);
    }

    public function show()
    {
        $passengers = $this->passengersRepository->getPassengers();
        return response()->json(new PassengersCollection($passengers));
    }

    public function find($id) 
    {
        $passenger = $this->passengersRepository->getPassenger($id);
        return response()->json(new PassengersResource($passenger));
    }

    public function delete($id)
    {
        $passenger = $this->passengersRepository->deletePassenger($id);
        return response()->json($passenger);
    }
}
