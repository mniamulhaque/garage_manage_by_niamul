<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'price'

    ];

    public static function storePainting($request)
    {
        foreach ($request->description as $key => $description) {
            $painting  = new Painting();
            $painting ->job_sheet_id   = $request->job_sheet_id;
            $painting  ->description   = $request['description'][$key];
            $painting  ->price         = $request['price'][$key];
            $painting  ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
