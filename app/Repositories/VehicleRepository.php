<?php
namespace App\Repositories;

use App\Http\Resources\Vehicles\VehiclesCollection;
use App\Models\Vehicles;

class VehicleRepository
{
    public function storeOrUpdate($id, $request) 
    {
        try {
            $vehicle = Vehicles::updateOrCreate(
                ["id" => $id],
                [
                    "name"              => $request->name,
                    "plate"             => $request->plate,
                    "year"              => $request->year,
                    "cor"               => $request->cor,
                    "total_capacity"    => $request->total_capacity,
                    "description"       => $request->description,
                ]
            );

            $request['vehicle_id'] = $vehicle->id;

            app('App\Http\Controllers\Api\MileageCarsController')->storeOrUpdate(null, $request);
            
            return $vehicle;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function show()
    {
        try {

            $vehicles = Vehicles::with('mileageCar')->get();
            return new VehiclesCollection($vehicles);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}