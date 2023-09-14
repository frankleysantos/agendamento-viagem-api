<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MileageCars extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'vehicle_id', 'last_mileage'];
    
}
