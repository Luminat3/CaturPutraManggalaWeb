<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Stock;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(): View
    {
        $total_customer = Customer::all()->count();
        return view('dashboard.history', ['total_customer', $total_customer]);
    }
}
