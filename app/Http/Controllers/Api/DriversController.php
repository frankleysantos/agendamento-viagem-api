<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DriversRepository;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    private $driversRepository;

    public function __construct(DriversRepository $driversRepository)
    {
        $this->driversRepository = $driversRepository;
    }

    public function storeOrUpdate(Request $request)
    {
        $driver = $this->driversRepository->storeOrCreate($request);
        return response()->json($driver);
    }

    public function show()
    {
        $drivers = $this->driversRepository->getDrivers();
        return response()->json($drivers);
    }
}
