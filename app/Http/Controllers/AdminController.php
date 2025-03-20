<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport; 

class AdminController extends Controller
{
        public function home()
    {
        return view('pages.admin.home');
    }

    public function datacustomer()
    {
        $customers = Customer::all();
        return view('pages.admin.datacustomer', compact('customers'));
    }

    public function daftaruser(){
        $users = User::all(); // Mengambil semua data pengguna
        return view('pages.admin.daftaruser', compact('users')); // Mengirim data ke view
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xls,xlsx',
        ]);

        // Mengimpor data ke database pertama
        Excel::import(new CustomerImport, $request->file('excelFile'));
 
        return redirect()->back()->with('success', 'Data berhasil diupload!');
    }
}
