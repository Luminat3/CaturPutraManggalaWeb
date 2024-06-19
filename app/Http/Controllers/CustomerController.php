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
        $request->validate(
            [
                "customer_name"=>"required",
                "lokasi"=>"required",
                "nomor_telepon"=>"required",
            ],
            [
                "customer_name"=>"Nama Pelanggan Tidak Boleh Kosong",
                "lokasi"=>"Lokasi Tidak Boleh Kosong",
                "nomor_telepon"=>"Nomor Telepon Tidak Boleh Kosong",
            ]);
        Customer::create($request->all());
        return redirect()->route('customer')->with("success","Customer telah ditambahkan");
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
        $customer = Customer::find($id);
        if ($customer) {
            $customer->transactions()->delete();
            $customer->delete();
        }
    
        return redirect()->route('customer')->with('success', "Pengguna Berhasil dihapus");
    }

}
