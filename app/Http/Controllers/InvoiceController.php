<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Vehicle;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.invoices.index', [
            'customer' => isset(request()->customer) ? Customer::findOrFail(\request()->customer) : null,
            'vehicles' => Vehicle::all(),
            'invoices' => Invoice::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.invoices.create', [
            'customer' => isset(request()->customer) ? Customer::findOrFail(\request()->customer) : null,
            'customers'  =>Customer::all(),
            'vehicles' => Vehicle::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $invoice = Invoice::storeInvoice($request);
            if ($invoice)
            {
                InvoiceDetail::storeInvoiceDetail($request, $invoice->id);
            }
            return response()->json(['status' => 'success', 'msg' => 'Invoice has been created','invoice' =>$invoice] );
        } catch (\Exception $exception) {
            return response()->json(['status' => 'success', 'msg' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.invoices.detail',['invoice'=>Invoice::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::where('id',$id)->first();
        if ($invoice)
        {
            $invoice->delete();
        }
        return redirect()->route('invoices.index')->with('success','Invoice Delete Successfully');
    }
}
