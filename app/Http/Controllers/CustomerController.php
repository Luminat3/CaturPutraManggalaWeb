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
        $validatedData = $request->validate(
            [
                "customer_name"=>"required|string|max:40",
                "lokasi"=>"required|string|max:70",
                "nomor_telepon"=>"required|string|max:15",
            ],
            [
                'customer_name.required' => 'Nama pelanggan wajib diisi.',
                'customer_name.max' => 'Nama pelanggan tidak boleh lebih dari 40 karakter.',
                'lokasi.required' => 'Lokasi wajib diisi.',
                'lokasi.max' => 'Lokasi tidak boleh lebih dari 50 karakter.',
                'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
                'nomor_telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            ]);


            try {
                // Masukkan data ke dalam database
                Customer::create($validatedData);

                return redirect()->route('customer')->with("success","Customer telah ditambahkan");
            } catch (\Exception $e) {
                // Tangani kesalahan database
                return redirect()->back()->with("error", "Gagal menambahkan pelanggan: " . $e->getMessage());
            }
    }

    public function getData($id)
    {
        $data = Customer::find($id);
        return view('dashboard.customer.edit', compact('data'));
    }

    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                "customer_name"=>"required|string|max:40",
                "lokasi"=>"required|string|max:70",
                "nomor_telepon"=>"required|string|max:15",
            ],
            [
                'customer_name.required' => 'Nama pelanggan wajib diisi.',
                'customer_name.max' => 'Nama pelanggan tidak boleh lebih dari 40 karakter.',
                'lokasi.required' => 'Lokasi wajib diisi.',
                'lokasi.max' => 'Lokasi tidak boleh lebih dari 50 karakter.',
                'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
                'nomor_telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            ]);

            try{
                $data = Customer::find($id);
                $data->update($validatedData);
                return redirect()->route('customer')->with('success', 'Data pelanggan berhasil diperbarui.');
            } catch (\Exception $e){
                return redirect()->back()->with("error", "Gagal menambahkan pelanggan: " . $e->getMessage());
            }


    }

    public function deleteData($id)
    {
        $customer = Customer::find($id);

        if($customer->trashed()){
            $customer->forceDelete();
        }

        $customer->delete();

        return redirect()->route('customer')->with('success', "Pengguna Berhasil dihapus");
    }

}
