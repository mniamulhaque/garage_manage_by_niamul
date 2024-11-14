<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public static function updateOrCreateVehicleBrand($request, $vehicleBrand = null)
    {
        return VehicleBrand::updateOrCreate(['id' => $vehicleBrand], $request->all());
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
