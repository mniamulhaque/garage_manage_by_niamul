<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'description',
        'qty',
        'price',
        'amount'
    ];

    public static function storeInvoiceDetail($request, $invoice_id)
    {
        foreach ($request->qty as $key => $qty) {
            $invoiceDetail = new InvoiceDetail();
            $invoiceDetail->invoice_id  = $invoice_id;
            $invoiceDetail->description  = $request['description'][$key];
            $invoiceDetail->qty  = $request['qty'][$key];
            $invoiceDetail->price  = $request['price'][$key];
            $invoiceDetail->amount  = $request['amount'][$key];
            $invoiceDetail->save();
        }
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
