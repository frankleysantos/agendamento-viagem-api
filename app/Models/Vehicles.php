<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = ['id', 'name', 'plate', 'year', 'cor', 'description', 'total_capacity'];

    public $timestamps = true;

    public function mileageCar()
    {
        return $this->hasMany(MileageCars::class, 'vehicle_id', 'id')->orderBy('id', 'desc');
    }

}
