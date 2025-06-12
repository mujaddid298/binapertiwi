<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use App\Models\AgingAr;
use App\Models\BillingDocument;
use Carbon\Carbon;

class BcController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->query('search_menu');
        $plantFilter = $request->query('plant'); // Tambahkan ini
    
        if ($search) {
            $customers = Customer::where('nama', 'like', '%' . $search . '%')->get();
        } else {
            $customers = Customer::all();
        }
    
        $id = $request->query('id');
        $today = Carbon::today();
    
        if ($id) {
            $selectedCustomer = Customer::find($id);
            $agingInvoices = AgingAr::where('customer_id', $id);
        } else {
            $selectedCustomer = null;
            $agingInvoices = AgingAr::query();
        }
    
        // Filter berdasarkan plant jika dipilih
        if ($plantFilter) {
            $agingInvoices->whereHas('billingDocument', function ($query) use ($plantFilter) {
                $query->where('plant', $plantFilter);
            });
        }
    
        $agingInvoices = $agingInvoices->get(); // Eksekusi query
    
        $hasOverdue31 = $agingInvoices->contains(function ($item) use ($today) {
            $dueDate = Carbon::parse($item->net_due_date);
            $daysLate = $today->diffInDays($dueDate, false);
            return $daysLate < -30;
        });
    
        if ($selectedCustomer) {
            $selectedCustomer->status = $hasOverdue31 ? 'blok' : 'aktif';
            $selectedCustomer->save();
        }
    
        // Proses data aging
        $rawData = $agingInvoices->map(function ($item) use ($today) {
            $due = Carbon::parse($item->net_due_date);
            $daysLate = $today->diffInDays($due, false);
    
            if ($daysLate >= 0) {
                $aging = 'CURRENT';
            } elseif ($daysLate >= -30) {
                $aging = '1 - 30';
            } elseif ($daysLate >= -60) {
                $aging = '31 - 60';
            } elseif ($daysLate >= -90) {
                $aging = '61 - 90';
            } else {
                $aging = '91 - 120';
            }
    
            $item->aging_ar = $aging;
            $item->save();
            $item->aging = $aging;
    
            return $item;
        });
    
        // Grouping dan perhitungan seperti sebelumnya
        $agingCategories = ['CURRENT', '1 - 30', '31 - 60', '61 - 90', '91 - 120'];

        $grouped = $rawData->groupBy('sales_organization')->map(function ($items) use ($agingCategories) {
            $row = [];
            foreach ($agingCategories as $category) {
                $row[$category] = $items->where('aging', $category)->sum('outstanding_ar') ?: 0;
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

        // Hitung total customer aktif
        $totalCustomer = Customer::where('status', 'aktif')->count();

        // Hitung total AR (outstanding)
        $totalAR = AgingAr::sum('outstanding_ar');

        // Ambil nama customer dan total AR per customer yang relevan dengan filter plant
        $filteredCustomers = $customers->filter(function ($c) use ($plantFilter) {
            if (!$plantFilter) return true;

            return $c->agingAr->contains(function ($ar) use ($plantFilter) {
                return $ar->billingDocument && $ar->billingDocument->plant === $plantFilter;
            });
        });

        $customerNames = $filteredCustomers->pluck('nama');
        
        $customerARs = $filteredCustomers->map(function ($c) use ($plantFilter) {
            return $c->agingAr->filter(function ($ar) use ($plantFilter) {
                return $ar->billingDocument && $ar->billingDocument->plant === $plantFilter;
            })->sum('outstanding_ar');
        });



        return view('pages.bc.home', compact('selectedCustomer', 'grouped', 'agingCategories', 'grandTotal', 'outstanding_total',
         'customers', 'selectedCustomer', 'agingInvoices',
        'invoices','agingInvoices','groupedByAging','salesOrgs','grandAgingTotal','matrix','grandTotals', 'totalCustomer', 'totalAR', 'customerNames', 'customerARs',
        ));
    }


    public function formnak()
    {
        return view('pages.bc.form_nak');
    }
    public function openblock()
    {
        return view('pages.bc.form_openblock');
    }
    public function level1()
    {
        return view('pages.bc.level1');
    }
    public function level3()
    {
        return view('pages.bc.level3');
    }

    public function persetujuan3()
    {
        return view('pages.bc.persetujuan3');
    }

    public function detail()
    {
        return view('pages.bc.detail');
    }

    public function datacustomer()
    {
        $customers = Customer::all();
        return view('pages.bc.datacustomer', compact('customers'));
    }

    public function daftaruser(){
        $users = User::all(); // Mengambil semua data pengguna
        return view('pages.bc.daftaruser', compact('users')); // Mengirim data ke view
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

//     public function getCustomer($id)
//     {
//         $customer = Customer::findOrFail($id);
//         $today = Carbon::today();

//         $agingInvoices = AgingAr::where('customer_id', $id)->get();

//         $hasOverdue31 = $agingInvoices->contains(function ($item) use ($today) {
//             $dueDate = Carbon::parse($item->net_due_date);
//             $daysLate = $today->diffInDays($dueDate, false);
// return $daysLate < -30; // Sudah lewat lebih dari 30 hari

//         });

//         if ($hasOverdue31) {
//             $customer->status = 'blok';
//             $customer->save();
//         } else {
//             $customer->status = 'aktif'; // Atau null
//             $customer->save();
//         }

//         $rawData = AgingAr::where('customer_id', $id)->get()->map(function ($item) use ($today) {
//             $due = Carbon::parse($item->net_due_date);
//             $daysLate = $today->diffInDays($due, false); // hasil bisa negatif
        
//             if ($daysLate >= 0) {
//                 $aging = 'CURRENT';
//             } elseif ($daysLate < 0 && $daysLate >= -30) {
//                 $aging = '1 - 30';
//             } elseif ($daysLate < -30 && $daysLate >= -60) {
//                 $aging = '31 - 60';
//             } elseif ($daysLate < -60 && $daysLate >= -90) {
//                 $aging = '61 - 90';
//             } else {
//                 $aging = '91 - 120';
//             }
        
//             // Simpan ke database
//             $item->aging_ar = $aging;
//             $item->save();
        
//             // Simpan ke objek sementara juga kalau masih dipakai di view
//             $item->aging = $aging;
        
//             return $item;
//         });
        

//         // Grouping dan perhitungan seperti sebelumnya
//         $agingCategories = ['CURRENT', '1 - 30', '31 - 60', '61 - 90', '91 - 120'];

//         $grouped = $rawData->groupBy('sales_organization')->map(function ($items) use ($agingCategories) {
//             $row = [];
//             foreach ($agingCategories as $category) {
//                 $row[$category] = $items->where('aging_ar', $category)->sum('outstanding_ar') ?: 0;
//             }
//             $row['Grand Total'] = $items->sum('outstanding_ar');
//             return $row;
//         });

//                 // Group berdasarkan aging_ar → sales_organization
//         $groupedByAging = $rawData->groupBy('aging')->map(function ($items) {
//             return $items->groupBy('sales_organization')->map(function ($salesItems) {
//                 return $salesItems->sum('outstanding_ar');
//             });
//         });

//         // Ambil semua sales_organization unik agar kolom bisa ditampilkan dinamis
//         $salesOrgs = $rawData->pluck('sales_organization')->unique();

//         // Buat total per aging group
//         $grandAgingTotal = $rawData->groupBy('aging')->map(function ($items) {
//             return $items->sum('outstanding_ar');
//         });
//         $matrix = [];

// foreach ($rawData as $row) {
//     $org = $row->sales_organization;
//     $aging = $row->aging_ar;
//     $amount = $row->outstanding_ar;

//     // Inisialisasi jika belum ada
//     if (!isset($matrix[$org])) {
//         $matrix[$org] = [];
//     }

//     // Tambahkan nominal ke kategori aging
//     if (!isset($matrix[$org][$aging])) {
//         $matrix[$org][$aging] = 0;
//     }

//     $matrix[$org][$aging] += $amount;
// }

// // Semua aging categories untuk heading
// $agingCategories = ['CURRENT', '1 - 30', '31 - 60', '61 - 90', '91 - 120'];

// // Hitung total per org dan grand total
// $grandTotals = [];
// foreach ($matrix as $org => $agingValues) {
//     $matrix[$org]['total'] = array_sum($agingValues);
//     foreach ($agingCategories as $aging) {
//         $grandTotals[$aging] = ($grandTotals[$aging] ?? 0) + ($agingValues[$aging] ?? 0);
//     }
// }
// $grandTotals['total'] = array_sum($grandTotals);





//             $grandTotal = [];
//             foreach ($agingCategories as $category) {
//                 $grandTotal[$category] = $rawData->where('aging_ar', $category)->sum('outstanding_ar');
//             }
//             $grandTotal['Grand Total'] = $rawData->sum('outstanding_ar');

//             $outstanding_total = $rawData->sum('outstanding_ar');


//             $invoices = $agingInvoices->map(function ($inv) use ($today) {
//             $due = Carbon::parse($inv->net_due_date);
//             $inv->days_late = $due->diffInDays($today, false);
//             return $inv;
//         });
        

//         return view('pages.bc.home', compact('customer', 'grouped', 'agingCategories', 'grandTotal', 'outstanding_total',
//         'invoices','agingInvoices','groupedByAging','salesOrgs','grandAgingTotal','matrix','grandTotals', 'customerNames', 'customerARs'));
//     }

}