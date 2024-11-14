<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tp extends Model
{
    use HasFactory;

    protected $fillable = [

        'name'

    ];

    public static function storeTp($request)
    {
        foreach ($request->name as $key => $name) {
            $tp  = new Tp();
            $tp ->job_sheet_id   = $request->job_sheet_id;
            $tp ->name    = $request['name'][$key];
            $tp ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
