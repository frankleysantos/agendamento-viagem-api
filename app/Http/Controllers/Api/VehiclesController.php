<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehiclesRequest;
use App\Repositories\VehicleRepository;

class VehiclesController extends Controller
{
    protected $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->middleware('auth:api');
        $this->vehicleRepository = $vehicleRepository;
    }

    public function storeOrUpdate(VehiclesRequest $request, $id = null) 
    {
        $vehicle = $this->vehicleRepository->storeOrUpdate($id, $request);
        return response()->json($vehicle);
    }

    public function show()
    {
        $vehicles = $this->vehicleRepository->show();
        return response()->json($vehicles);
    }
}
