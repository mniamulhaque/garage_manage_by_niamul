<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('/login');
    }
    // public function generate(Customer $customer)
    // {
    //     return view('backend.customers.generate', [
    //         'customer' => isset(request()->customer) ? Customer::findOrFail(\request()->customer) : null,
    //     ]);
    // }
}
