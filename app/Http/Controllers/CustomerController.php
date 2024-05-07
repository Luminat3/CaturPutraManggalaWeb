<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function show(): View
    {
        $customer = Customer::all();
        return view('dashboard.customer', ['customer'=>$customer]);
    }
}
