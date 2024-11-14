<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSheet;
use App\Models\Customer; // Assuming you want to search users as well
use App\Models\Invoice; // Assuming you want to search orders as well

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Query the Jobsheet model

        // $jobsheets = Jobsheet::where('job_no', 'like', '%' . $search . '%')
        //     ->orWhere('mobile', 'like', '%' . $search . '%')
        //     ->get();

        // Query the User model (if you want to search users too)
        $customers = Customer::where('name', 'like', '%' . $search . '%')
            ->orWhere('mobile', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->get();

        // Query the Order model (if you want to search orders too)
        // $invoices = Invoice::where('invoice_number', 'like', '%' . $search . '%')->get();

        // Return results to the view
        // return view('backend.search.results', compact('jobsheets', 'customers', 'invoices', 'search'));

        return view('backend.search.results', compact( 'customers',  'search'));
    }
}


