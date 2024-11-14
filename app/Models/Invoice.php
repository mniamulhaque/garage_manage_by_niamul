<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'invoice_number',
        'sub_total',
        'total',
        'paid',
        'due',
        'status',
    ];

    public static function storeInvoice($request){
        $invoice = new Invoice();
        $invoice->customer_id   = $request->customer_id;
        $invoice->invoice_number   = rand(10000000,99999999);
        $invoice->sub_total   = $request->sub_total;
        $invoice->total   = $request->total;
        $invoice->status   = $request->total;
        $invoice->save();

        return $invoice;
    }

    public static function generateInvoiceNumber($number = null)
    {

    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
