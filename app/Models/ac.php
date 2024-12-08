<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'price'

    ];

    public static function storeAc($request)
    {
        foreach ($request->description as $key => $description) {
            $ac  = new ac();
            $ac->job_sheet_id   = $request->job_sheet_id;
            $ac->description   = $request['description'][$key];
            $ac->price         = $request['price'][$key];
            $ac->save();
        }
    }
}
