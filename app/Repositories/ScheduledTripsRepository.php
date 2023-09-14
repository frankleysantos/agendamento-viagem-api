<?php 

namespace App\Repositories;

use App\Models\ScheduledTrips;

class ScheduledTripsRepository
{
    public function storeOrUpdate($request)
    {
        try {
            $scheduledTrip = ScheduledTrips::updateOrCreate(
                ['id' => $request->id],
                [
                    'vehicle_id' => $request->vehicle_id, 
                    'destination_city_id' => $request->destination_city_id, 
                    'driver_id' => $request->driver_id, 
                    'travel_date' => $request->travel_date, 
                    'departure_time' => $request->departure_time, 
                    'status' => $request->status
                ]
            );

            return $scheduledTrip;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getScheduledTrips()
    {
        try {
            $scheduledTrips = ScheduledTrips::with('vehicle', 'driver', 'citie')->get();
            return $scheduledTrips;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}