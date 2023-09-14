<?php
namespace App\Repositories;

use App\Http\Resources\Drivers\DriversCollection;
use App\Models\Drivers;

class DriversRepository 
{
    public function storeOrCreate($request)
    {
        try {
            $driver = Drivers::updateOrCreate(
                ['id' => $request->id],
                [
                    'name'          => $request->name, 
                    'telephone'     => $request->telephone, 
                    'cnh_category'  => $request->cnh_category, 
                    'cnh_number'    => $request->cnh_number
                ]
            );
            return $driver;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getDrivers()
    {
        try {
            $drivers = Drivers::all();
            return new DriversCollection($drivers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}