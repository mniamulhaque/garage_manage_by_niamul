<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'vehicle_number',
        'address',
        'email'
    ];

    public static function updateOrCreateCustomer($request, $customer = null)
    {
        return Customer::updateOrCreate(['id' => $customer,'vehicle_number' => 0], $request->all());
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function jobSheets()
    {
        return $this->hasMany(Vehicle::class);
    }
}
