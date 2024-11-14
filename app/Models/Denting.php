<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denting extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'price'

    ];

    public static function storeDenting($request)
    {
        foreach ($request->description as $key => $description) {
            $denting  = new Denting();
            $denting ->job_sheet_id   = $request->job_sheet_id;
            $denting  ->description   = $request['description'][$key];
            $denting  ->price         = $request['price'][$key];
            $denting  ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }

}
