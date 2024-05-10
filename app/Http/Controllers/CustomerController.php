<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customer = Customer::all();
        return view('dashboard.customer.index', ['customer'=>$customer]);
    }

    public function create_view(): View
    {
        return view('dashboard.customer.create');
    }

    public function add(Request $request)
    {
        Customer::create($request->all());
        return redirect()->route('customer');
    }

    public function getData($id)
    {
        $data = Customer::find($id);
        return view('dashboard.customer.edit', compact('data'));
    }

    public function updateData(Request $request, $id)
    {
        $data = Customer::find($id);
        $data->update($request->all());
        return redirect()->route('customer');
    }

    public function deleteData($id)
    {
        $data = Customer::find($id);
        $data->delete();
        return redirect()->route('customer');
    }

}
