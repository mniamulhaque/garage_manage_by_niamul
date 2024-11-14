<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperHistory extends Model
{
    use HasFactory;

    protected $fillable = [

        'job_sheet_id',
        'date',
        'tax_token',
        'tax_token_note',
        'fitness',
        'fitness_note',
        'milage',
        'milage_note'

    ];

    public static function storePaperHistory($request, )
    {
        foreach ($request->date as $key => $date) {
            $paperHistory= new PaperHistory();
            $paperHistory ->job_sheet_id   = $request->job_sheet_id;
            $paperHistory ->date           = $request['date'][$key];
            $paperHistory ->tax_token      = $request['tax_token'][$key];
            $paperHistory ->tax_token_note = $request['tax_token_note'][$key];
            $paperHistory ->fitness        = $request['fitness'][$key];
            $paperHistory ->fitness_note   = $request['fitness_note'][$key];
            $paperHistory ->milage         = $request['milage'][$key];
            $paperHistory ->milage_note    = $request['milage_note'][$key];
            $paperHistory ->save();
        }
    }

    public function jobsheet()
    {
        return $this->belongsTo(JobSheet::class);
    }
}
