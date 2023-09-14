<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ScheduledTripsRepository;
use Illuminate\Http\Request;

class ScheduledTripsController extends Controller
{
    private $scheduledTripsRepository;

    public function __construct(ScheduledTripsRepository $scheduledTripsRepository)
    {
        $this->scheduledTripsRepository = $scheduledTripsRepository;
    }

    // salvar ou atualizar dados da viagem;
    public function storeOrUpdate(Request $request)
    {
        $response = $this->scheduledTripsRepository->storeOrUpdate($request);
        return response()->json($response);
    }

    public function show()
    {
        $response = $this->scheduledTripsRepository->getScheduledTrips();
        return response()->json($response);
    }

}
