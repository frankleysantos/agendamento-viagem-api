<?php 
namespace App\Repositories;

use App\Models\MileageCars;

class MileageCarsRepository
{
    public function storeOrUpdate($id, $request)
    {
        try {
            $mileageCar = MileageCars::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'vehicle_id' => $request->vehicle_id, 
                    'last_mileage'  => $request->last_mileage
                ]
            );
            return $mileageCar;
        } catch (\Exception $e) {
            return $e->getMessage(); 
        }
    }
}