<?php

 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KomiteController extends Controller
{
    public function home()
    {
        $customers = Customer::all();
        return view('pages.komite.home', compact('customers'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('pages.komite.profile.profile', compact('user'));
    }
    public function editprofile()
    {
        $user = Auth::user();
        return view('pages.komite.profile.editprofile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'cabang' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        // Update data user
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->jabatan = $request->jabatan;
        $user->cabang = $request->cabang;
        $user->no_hp = $request->no_hp;
    
        // Jika password diisi, hash dan simpan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('komite.profile.profile')->with('success', 'Profile updated successfully.');
    }
    
    public function formnak()
    {
        return view('pages.komite.form_nak');
    }
    public function openblock()
    {
        return view('pages.komite.form_openblock');
    }
    public function level1()
    {
        return view('pages.komite.level1');
    }
    public function level3()
    {
        return view('pages.komite.level3');
    }

    public function persetujuan3()
    {
        return view('pages.komite.persetujuan3');
    }

    public function detail()
    {
        return view('pages.komite.detail');
    }

    public function datacustomer()
    {
        $customers = Customer::all();
        return view('pages.komite.datacustomer', compact('customers'));
    }

    public function daftaruser()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('pages.komite.daftaruser', compact('users')); // Mengirim data ke view
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