<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adp extends Model
{
    use HasFactory;
    protected $fillable = [

        'description',
        'amount',
        'date'

    ];

    public static function storeAdp($request, )
    {
        foreach ($request->description as $key => $description) {
            $adp= new Adp();
            $adp ->job_sheet_id   = $request->job_sheet_id;
            $adp ->description    = $request['description'][$key];
            $adp ->amount         = $request['amount'][$key];
            $adp ->date           = $request['date'][$key];
            $adp ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
