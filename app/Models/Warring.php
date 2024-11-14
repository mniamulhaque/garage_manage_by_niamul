<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warring extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'price'

    ];

    public static function storeWarring($request)
    {
        foreach ($request->description as $key => $description) {
            $warring  = new Warring();
            $warring ->job_sheet_id   = $request->job_sheet_id;
            $warring  ->description   = $request['description'][$key];
            $warring  ->price         = $request['price'][$key];
            $warring  ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
