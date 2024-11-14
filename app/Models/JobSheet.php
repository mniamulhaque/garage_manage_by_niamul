<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_no',
        'date',
        'customer_id',
        'vehicle_id',
        'color',
        'driver_name',
        'mob',
        'vehicle_incoming_date',
        'vehicle_outgoing_date',
        'received_by'
    ];

    public static function updateOrCreateJobSheet($request, $jobSheet = null)
    {
        return JobSheet::updateOrCreate(['id' => $jobSheet], $request->all());
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function wds()
    {
        return $this->hasMany(Wd::class);
    }
    public function spvs()
    {
        return $this->hasMany(Spv::class);

    }

    public function tps()
    {
        return $this->hasMany(Tp::class);

    }

    public function adps()
    {
        return $this->hasMany(Adp::class);
    }

    public function twbs()
    {
        return $this->hasMany(Twb::class);
    }

    public function engines()
    {
        return $this->hasMany(Engine::class);
    }

    public function dentings()
    {
        return $this->hasMany(Denting::class);
    }

    public function paintings()
    {
        return $this->hasMany(Painting::class);
    }

    public function warrings()
    {
        return $this->hasMany(Warring::class);
    }

    public function paperhistories()
    {
        return $this->hasMany(PaperHistory::class);
    }



}
