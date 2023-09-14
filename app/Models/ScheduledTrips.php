<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledTrips extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'vehicle_id', 'destination_city_id', 'driver_id', 'travel_date', 'departure_time', 'status'];

    public function vehicle()
    {
        return $this->hasOne(Vehicles::class, 'id', 'vehicle_id');
    }

    public function driver()
    {
        return $this->hasOne(Drivers::class, 'id', 'driver_id');
    }

    public function citie()
    {
        return $this->hasOne(Cities::class, 'id', 'destination_city_id');
    }
}
