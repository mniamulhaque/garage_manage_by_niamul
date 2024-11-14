<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use Illuminate\Http\Request;

class VehicleBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.vehicle-brands.index', [
            'vehicleBrands' => VehicleBrand::latest()->get()
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
            $vehicleBrand = VehicleBrand::updateOrCreateVehicleBrand($request);

                return redirect()->route('vehicle-brands.index')->with('success', 'Vehicle Brand added successfully');

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
    public function edit(VehicleBrand $vehicleBrand)
    {
        return response()->json($vehicleBrand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleBrand $vehicleBrand)
    {
        try {
            VehicleBrand::updateOrCreateVehicleBrand($request, $vehicleBrand->id);
            return redirect()->route('vehicle-brands.index')->with('success', 'Vehicle Brand updated successfully');
        } catch (\Exception $exception) {
            return redirect()->route('vehicle-brands.index')->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleBrand $vehicleBrand)
    {
        $vehicleBrand->delete();
        return redirect()->back()->with('success', 'Vehicle Brand deleted successfully');
    }
}
