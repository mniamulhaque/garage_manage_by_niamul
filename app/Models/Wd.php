<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wd extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_sheet_id',
        'wdes',

    ];

    public static function storeWd($request)
    {
        foreach ($request->wdes as $key => $wdes) {
            $wd = new Wd();
            $wd ->job_sheet_id  = $request->job_sheet_id;
            $wd ->wdes  = $request['wdes'][$key];
            $wd ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }

}
