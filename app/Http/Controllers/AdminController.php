<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use App\Imports\BillingRecordImport;
use App\Models\AgingAr;
use App\Models\Nak;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function home()
    { 
        return view('pages.admin.home');
    }
    public function formnak()
    { 
        return view('pages.admin.form_nak');
    }
    public function openblock()
    { 
        return view('pages.admin.form_openblock');
    }
    public function level1()
    { 
        return view('pages.admin.level1');
    }
    public function level3()
    { 
        return view('pages.admin.level3');
    }

    public function persetujuan3()
    { 
        return view('pages.admin.persetujuan3');
    }

    public function detail($id)
    { 
        $customer = Customer::findOrFail($id);
        $today = Carbon::today();

        $agingInvoices = AgingAr::where('customer_id', $id)->get();

        $hasOverdue31 = $agingInvoices->contains(function ($item) use ($today) {
            $dueDate = Carbon::parse($item->net_due_date);
            $daysLate = $today->diffInDays($dueDate, false);
return $daysLate < -30; // Sudah lewat lebih dari 30 hari

        });

        if ($hasOverdue31) {
            $customer->status = 'blok';
            $customer->save();
        } else {
            $customer->status = 'aktif'; // Atau null
            $customer->save();
        }

        $rawData = AgingAr::where('customer_id', $id)->get()->map(function ($item) use ($today) {
            $due = Carbon::parse($item->net_due_date);
            $daysLate = $today->diffInDays($due, false); // hasil bisa negatif
        
            if ($daysLate >= 0) {
                $aging = 'CURRENT';
            } elseif ($daysLate < 0 && $daysLate >= -30) {
                $aging = '1 - 30';
            } elseif ($daysLate < -30 && $daysLate >= -60) {
                $aging = '31 - 60';
            } elseif ($daysLate < -60 && $daysLate >= -90) {
                $aging = '61 - 90';
            } else {
                $aging = '91 - 120';
            }
        
            // Simpan ke database
            $item->aging_ar = $aging;
            $item->save();
        
            // Simpan ke objek sementara juga kalau masih dipakai di view
            $item->aging = $aging;
        
            return $item;
        });
        

        // Grouping dan perhitungan seperti sebelumnya
        $agingCategories = ['CURRENT', '1 - 30', '31 - 60', '61 - 90', '91 - 120'];

        $grouped = $rawData->groupBy('sales_organization')->map(function ($items) use ($agingCategories) {
            $row = [];
            foreach ($agingCategories as $category) {
                $row[$category] = $items->where('aging', $category)->sum('outstanding_ar');
            }
            $row['Grand Total'] = $items->sum('outstanding_ar');
            return $row;
        });

                // Group berdasarkan aging_ar → sales_organization
        $groupedByAging = $rawData->groupBy('aging')->map(function ($items) {
            return $items->groupBy('sales_organization')->map(function ($salesItems) {
                return $salesItems->sum('outstanding_ar');
            });
        });

        // Ambil semua sales_organization unik agar kolom bisa ditampilkan dinamis
        $salesOrgs = $rawData->pluck('sales_organization')->unique();

        // Buat total per aging group
        $grandAgingTotal = $rawData->groupBy('aging')->map(function ($items) {
            return $items->sum('outstanding_ar');
        });
        $matrix = [];

foreach ($rawData as $row) {
    $org = $row->sales_organization;
    $aging = $row->aging_ar;
    $amount = $row->outstanding_ar;

    // Inisialisasi jika belum ada
    if (!isset($matrix[$org])) {
        $matrix[$org] = [];
    }

    // Tambahkan nominal ke kategori aging
    if (!isset($matrix[$org][$aging])) {
        $matrix[$org][$aging] = 0;
    }

    $matrix[$org][$aging] += $amount;
}

// Semua aging categories untuk heading
$agingCategories = ['CURRENT', '1 - 30', '31 - 60', '61 - 90', '91 - 120'];

// Hitung total per org dan grand total
$grandTotals = [];
foreach ($matrix as $org => $agingValues) {
    $matrix[$org]['total'] = array_sum($agingValues);
    foreach ($agingCategories as $aging) {
        $grandTotals[$aging] = ($grandTotals[$aging] ?? 0) + ($agingValues[$aging] ?? 0);
    }
}
$grandTotals['total'] = array_sum($grandTotals);





        $grandTotal = [];
        foreach ($agingCategories as $category) {
            $grandTotal[$category] = $rawData->where('aging_ar', $category)->sum('outstanding_ar');
        }
        $grandTotal['Grand Total'] = $rawData->sum('outstanding_ar');

        $outstanding_total = $rawData->sum('outstanding_ar');


        $invoices = $agingInvoices->map(function ($inv) use ($today) {
        $due = Carbon::parse($inv->net_due_date);
        $inv->days_late = $due->diffInDays($today, false);
        return $inv;
    });



    return view('pages.admin.detail', compact('customer', 'grouped', 'agingCategories', 'grandTotal', 'outstanding_total',
    'invoices','agingInvoices','groupedByAging','salesOrgs','grandAgingTotal','matrix','grandTotals'));
}

    

    public function datacustomer()
    {
        // Ambil semua customer
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
        Excel::import(new BillingRecordImport, $request->file('excelFile'));
 
        return redirect()->back()->with('success', 'Data berhasil diupload!');
    }

    public function createUser()
    {
        return view('pages.admin.tambahUser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'role' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'cabang' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
            'cabang' => $request->cabang,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.daftaruser')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'alamat' => 'required',
            'role' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'cabang' => 'required',
            // password opsional saat edit
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->jabatan = $request->jabatan;
        $user->no_hp = $request->no_hp;
        $user->cabang = $request->cabang;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.daftaruser')->with('success', 'Pengguna berhasil diupdate!');
    }

    
}
