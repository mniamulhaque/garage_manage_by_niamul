<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.vehicle-types.index', [
            'vehicleTypes' => VehicleType::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $vehicleType = VehicleType::updateOrCreateVehicleType($request);

                return redirect()->route('vehicle-types.index')->with('success', 'Vehicle Type added successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( VehicleType $vehicleType)
    {
        return response()->json($vehicleType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        try {
            VehicleType::updateOrCreateVehicleType($request, $vehicleType->id);
            return redirect()->route('vehicle-types.index')->with('success', 'Vehicle Type updated successfully');
        } catch (\Exception $exception) {
            return redirect()->route('vehicle-types.index')->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleType $vehicleType)
    {
        $vehicleType->delete();
        return redirect()->back()->with('success', 'Vehicle Type deleted successfully');
    }
}
