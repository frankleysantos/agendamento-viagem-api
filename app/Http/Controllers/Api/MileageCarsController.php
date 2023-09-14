<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MileageCarsRepository;
use Illuminate\Http\Request;

class MileageCarsController extends Controller
{
    private $mileageCarsRepository;

    public function __construct(MileageCarsRepository $mileageCarsRepository)
    {
        $this->mileageCarsRepository = $mileageCarsRepository;
    }

    public function storeOrUpdate($id = null, Request $request)
    {
        $mileage = $this->mileageCarsRepository->storeOrUpdate($id, $request);
        return response()->json($mileage);
    }
}
