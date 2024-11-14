<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_number',
        'vehicle_model',
        'vehicle_brand_id',
        'vehicle_type_id',
        'vehicle_color_id',
        'vehicle_current_milage'

    ];

    public static function updateOrCreateVehicle($request, $vehicle = null)
    {
        return Vehicle::updateOrCreate(['id' => $vehicle], $request->all());
    }

    public function vehicleBrand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class,'vehicle_color_id');


    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
