<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spv extends Model
{
    use HasFactory;

    protected $fillable = [

        'parts_name',
        'price'

    ];

    public static function storeSpv($request, )
    {
        foreach ($request->parts_name as $key => $parts_name) {
            $spv= new Spv();
            $spv ->job_sheet_id  = $request->job_sheet_id;
            $spv ->parts_name    = $request['parts_name'][$key];
            $spv ->price         = $request['price'][$key];
            $spv ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
