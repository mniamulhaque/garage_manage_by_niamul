<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function updateOrCreateColor($request, $color = null)
    {
        return Color::updateOrCreate(['id' => $color], $request->all());
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

}
