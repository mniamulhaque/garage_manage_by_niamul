<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\JobSheet;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {     $totalCustomers = Customer::count();
          $totalVehicles = Vehicle::count();
          $totalJobSheets = JobSheet::count();
          $todaysJobSheets = JobSheet::whereDate('created_at', Carbon::today())->count();
        return view('backend.dashboard.dashboard', compact('totalCustomers','totalVehicles','totalJobSheets','todaysJobSheets'));
    }
}
