<?php 
namespace App\Repositories;
use App\Models\Cities;
use App\Models\States;


class StatesCitiesRepository {

    public function getStates() {
        try {
            $states = States::all();
            return $states;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function getCities($state_id) {
        try {
            $cities = Cities::where('state_id', $state_id)->get();
            return $cities;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}