<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\Color;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.customers.index', [
            'customers' =>Customer::orderBy('id', 'desc')->get(),
            'vehicles'  =>Vehicle::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customers.add',['vehicles'=>Vehicle::all(),
             'vehicleBrands'  =>VehicleBrand::all(),
            'vehicleTypes'   =>VehicleType::all(),
            'vehicleColors'  =>Color::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return url()->previous();
        try {
            $customer = Customer::updateOrCreateCustomer($request);

            if (str()->contains(url()->previous(), url('/invoices') ))
            {
                return redirect()->route('invoices.index', ['customer' => $customer->id])->with('success', 'Customer added successfully');
            } else {
                return redirect()->route('customers.index')->with('success', 'Customer added successfully');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            Customer::updateOrCreateCustomer($request, $customer->id);
            return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
        } catch (\Exception $exception) {
            return redirect()->route('customers.index')->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
