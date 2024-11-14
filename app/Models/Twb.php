<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Twb extends Model
{
    use HasFactory;
    protected $fillable = [

        'description',
        'price'

    ];

    public static function storeTwb($request)
    {
        foreach ($request->description as $key => $description) {
            $twb  = new Twb();
            $twb ->job_sheet_id   = $request->job_sheet_id;
            $twb  ->description   = $request['description'][$key];
            $twb  ->price         = $request['price'][$key];
            $twb  ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
