<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.vehicles.index',[
            'vehicles'       =>Vehicle::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('backend.vehicles.create',[
            'vehicleBrands'  =>VehicleBrand::all(),
            'vehicleTypes'   =>VehicleType::all(),
            'vehicleColors'  =>Color::all(),
            'rf'             =>$request->rf ?? ''

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $vehicle = Vehicle::updateOrCreateVehicle($request);



            if ($request->rf == 'customerCreate')
            {
                return redirect()->route('customers.create'
                )->with('success', 'Vehicle added successfully');
            } else {
                return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully');
            }



        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Please all input requert');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return response()->json([
            'vehicle' =>$vehicle,
            'color' =>$vehicle->color
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.vehicles.create',[
            'vehicleBrands'  =>VehicleBrand::all(),
            'vehicleTypes'   =>VehicleType::all(),
            'vehicleColors'  =>Color::all(),
            'rf'             =>$request->rf ?? '',
            'vehicle'        =>Vehicle::where('id',$id)->first(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         Vehicle::updateOrCreateVehicle($request,$id);
        return redirect()->route('vehicles.index')->with('success','Vehicle Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::where('id',$id)->first();
        if ($vehicle)
        {
            $vehicle->delete();
        }
        return redirect()->route('vehicles.index')->with('success','Vehicle Delete Successfully');
    }
}
