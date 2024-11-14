<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'price'

    ];

    public static function storeEngine($request)
    {
        foreach ($request->description as $key => $description) {
            $engine  = new Engine();
            $engine ->job_sheet_id   = $request->job_sheet_id;
            $engine  ->description   = $request['description'][$key];
            $engine  ->price         = $request['price'][$key];
            $engine  ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
