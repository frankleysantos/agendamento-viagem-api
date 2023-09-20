<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cities\CitiesCollection;
use App\Http\Resources\States\StatesCollection;
use App\Repositories\StatesCitiesRepository;
use Illuminate\Http\Request;

class StatesCitiesController extends Controller
{
    protected $statesCitiesRepository;

    public function __construct(StatesCitiesRepository $statesCitiesRepository)
    {
        $this->statesCitiesRepository = $statesCitiesRepository;
    }

    public function showStates()
    {
        $states = $this->statesCitiesRepository->getStates();
        return response()->json(new StatesCollection($states));
    }

    public function showCities($state_id) 
    {
        $cities = $this->statesCitiesRepository->getCities($state_id);
        return response()->json(new CitiesCollection($cities));
    }
}
