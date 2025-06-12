<?php

namespace App\Http\Controllers;

use App\Mail\OpenBlockSubmitted;
use App\Models\AgingAr;
use App\Models\Approval;
use Illuminate\Http\Request;
use App\Models\Openblok;
use App\Models\Customer;
use App\Models\OpenBlock;
use App\Models\OpenblockAging;
use App\Models\Persetujuan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class OpenblokController extends Controller
{

    public function index(Request $request, $id)
    {
        //dd(Auth::user()->id);
        $customer = Customer::findOrFail($id);
        $agingar = AgingAr::where('customer_id', $id)->first();
    
        // Gunakan akhir bulan sebagai referensi aging
        $today = Carbon::now()->endOfMonth();
    
        $agingData = AgingAr::where('customer_id', $id)->get()->map(function ($item) use ($today) {
            $due = Carbon::parse($item->net_due_date);
            $daysLate = $today->diffInDays($due, false); // negatif = lewat
    
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
    
            $item->aging = $aging;
            return $item;
        });
    
        // Hanya aging group tertentu yang ingin ditampilkan
        $displayAging = ['1 - 30', '31 - 60', '61 - 90', '90 up'];
    
        // Map 91 - 120 menjadi '90 up' agar sesuai tampilan
        $excelData = [];
        foreach ($displayAging as $agingLabel) {
            $entries = $agingData->filter(function ($item) use ($agingLabel) {
                if ($agingLabel == '90 up') {
                    return $item->aging === '91 - 120';
                }
                return $item->aging === $agingLabel;
            });
    
            $nilai = $entries->sum('outstanding_ar');
            $plan = $entries->sum('outstanding_ar');
            $tanggal = $entries->first()?->document_date;
            $cara = $entries->first()?->transaction_type;
    
            $excelData[$agingLabel] = [
                'nilai' => $nilai,
                'plan' => $plan,
                'tanggal' => $tanggal ? Carbon::parse($tanggal)->translatedFormat('l, d F Y') : '',
                'cara' => $cara ?? '',
            ];
        }
    
        $totalNilai = array_sum(array_column($excelData, 'nilai'));
        $totalPlan = array_sum(array_column($excelData, 'plan'));

        $bulanTahun = $request->input('bulan_tahun') ?? date('Y-m');
        //dd($bulanTahun);
        Log::info('Nilai bulan_tahun:', ['bulan_tahun' => $bulanTahun]);
        // Ambil semua blok milik customer yang sesuai
        $blocks = OpenBlock::where('customer_id', $id)->get();
    
        $matchingBlocks = [];
        foreach ($blocks as $block) {
            $blockDates = [
                'block1_date' => $block->block1_date,
                'block2_date' => $block->block2_date,
                'block3_date' => $block->block3_date,
                'block4_date' => $block->block4_date,
            ];
    
            foreach ($blockDates as $key => $blockDate) {
                if ($blockDate) {
                    $blockMonth = Carbon::parse($blockDate)->format('Y-m');
                    if ($blockMonth === $bulanTahun) {
                        $matchingBlocks[] = [
                            'block' => $block,
                            'block_name' => $key,
                            'block_date' => $blockDate,
                        ];
                    }
                }
            }
        }
    
    
        return view('pages.admin.form_openblock', compact(
            'customer',
            'excelData',
            'totalNilai',
            'totalPlan',
            'agingar','matchingBlocks', 'bulanTahun',
            'displayAging'
        ));

        
    }
    

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'tanggal' => 'required|date',
    //         'diajukan' => 'required|string',
    //         'cabang' => 'required|string',
    //         'customer_code' => 'required|exists:customers,id',
    //         'tier_risk' => 'required|string',
    //         'customer_group' => 'required|string',
    //         'plafond' => 'required|string',
    //         'payment_method' => 'required|string',
    //         'payment_date' => 'required|date',
    //         'nilai_piutang' => 'required|string',
    //         'bulan_tahun' => 'nullable|string',
    //         'block1_amount' => 'nullable|string',
    //         'block1_total' => 'nullable|string',
    //         'block1_date' => 'nullable|date',
    //         'block2_amount' => 'nullable|string',
    //         'block2_total' => 'nullable|string',
    //         'block2_date' => 'nullable|date',
    //         'block3_amount' => 'nullable|string',
    //         'block3_total' => 'nullable|string',
    //         'block3_date' => 'nullable|date',
    //         'block4_amount' => 'nullable|string',
    //         'block4_total' => 'nullable|string',
    //         'block4_date' => 'nullable|date',
    //         'total_amount' => 'nullable|string',
    //         'total_ytd' => 'nullable|string',
    //         'payment_last_month' => 'nullable|string',
    //         'payment_last_month_ytd' => 'nullable|string',
    //         'payment_last_month_date' => 'nullable|date',
    //         'actual_payment' => 'nullable|string',
    //         'actual_payment_ytd' => 'nullable|string',
    //         'actual_payment_date' => 'nullable|date',
    //         'plan_payment' => 'nullable|string',
    //         'plan_payment_ytd' => 'nullable|string',
    //         'plan_payment_date' => 'nullable|date',
    //         'pending_billing' => 'nullable|string',
    //         'pending_billing_ytd' => 'nullable|string',
    //         'pending_billing_date' => 'nullable|date',
    //         'total_sales' => 'nullable|string',
    //         'total_sales_ytd' => 'nullable|string', 
    //         'status_pkps' => 'required|string',
    //         'business_type' => 'required|string',
    //         'bouwhere' => 'required|string',
    //         'payment_trend' => 'required|numeric',
    //         'commodity_potential' => 'required|string',
    //         'business_prospect' => 'required|string',
    //     ]);

    //     // Optional: Adjust fields for database if needed
    //     $validated['created_at'] = Carbon::now();
    //     $validated['updated_at'] = Carbon::now();

    //     OpenBlock::create($validated);

    //     return redirect()->route('openblok.index')->with('success', 'Data pembukaan blok berhasil disimpan.');
    // }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'diajukan' => 'required|string',
            'cabang' => 'required|string',
            'customer_code' => 'required|exists:customers,id',
            'tier_risk' => 'required|string',
            'customer_group' => 'required|string',
            'plafond' => 'required|string',
            'payment_method' => 'required|string',
            'payment_date' => 'required|date',
            'nilai_piutang' => 'required|string',
            'bulan_tahun' => 'nullable|string',
    
            // blok
            'block1_amount' => 'nullable|string',
            'block1_total' => 'nullable|string',
            'block1_date' => 'nullable|date',
            'block2_amount' => 'nullable|string',
            'block2_total' => 'nullable|string',
            'block2_date' => 'nullable|date',
            'block3_amount' => 'nullable|string',
            'block3_total' => 'nullable|string',
            'block3_date' => 'nullable|date',
            'block4_amount' => 'nullable|string',
            'block4_total' => 'nullable|string',
            'block4_date' => 'nullable|date',
    
            // pembayaran & lainnya
            'total_amount' => 'nullable|string',
            'total_ytd' => 'nullable|string',
            'payment_last_month' => 'nullable|string',
            'payment_last_month_ytd' => 'nullable|string',
            'payment_last_month_date' => 'nullable|date',
            'actual_payment' => 'nullable|string',
            'actual_payment_ytd' => 'nullable|string',
            'actual_payment_date' => 'nullable|date',
            'plan_payment' => 'nullable|string',
            'plan_payment_ytd' => 'nullable|string',
            'plan_payment_date' => 'nullable|date',
            'pending_billing' => 'nullable|string',
            'pending_billing_ytd' => 'nullable|string',
            'pending_billing_date' => 'nullable|date',
            'total_sales' => 'nullable|string',
            'total_sales_ytd' => 'nullable|string',
            'total_sales_date' => 'nullable|date',
    
            'status_pkps' => 'required|string',
            'business_type' => 'required|string',
            'bouwhere' => 'required|string',
            'payment_trend' => 'required|numeric',
            'commodity_potential' => 'required|string',
            'business_prospect' => 'required|string',
    
            'nilai' => 'nullable|string',
            'plan' => 'nullable|string',
            'tanggal_aging' => 'nullable|date',
        ]);
    
        DB::beginTransaction();
        try {
            $openblock = OpenBlock::create([
                'tanggal' => $validated['tanggal'],
                'diajukan' => $validated['diajukan'],
                'cabang' => $validated['cabang'],
                'customer_id' => $validated['customer_code'],
                'tier_risk' => $validated['tier_risk'],
                'customer_group' => $validated['customer_group'],
                'plafond' => $validated['plafond'],
                'payment_method' => $validated['payment_method'],
                'payment_date' => $validated['payment_date'],
                'nilai_piutang' => $validated['nilai_piutang'],
                'bulan_tahun' => $validated['bulan_tahun'] ?? null,
    
                'block1_amount' => $validated['block1_amount'] ?? null,
                'block1_total' => $validated['block1_total'] ?? null,
                'block1_date' => $validated['block1_date'] ?? null,
                'block2_amount' => $validated['block2_amount'] ?? null,
                'block2_total' => $validated['block2_total'] ?? null,
                'block2_date' => $validated['block2_date'] ?? null,
                'block3_amount' => $validated['block3_amount'] ?? null,
                'block3_total' => $validated['block3_total'] ?? null,
                'block3_date' => $validated['block3_date'] ?? null,
                'block4_amount' => $validated['block4_amount'] ?? null,
                'block4_total' => $validated['block4_total'] ?? null,
                'block4_date' => $validated['block4_date'] ?? null,
    
                'total_amount' => $validated['total_amount'] ?? null,
                'total_ytd' => $validated['total_ytd'] ?? null,
                'payment_last_month' => $validated['payment_last_month'] ?? null,
                'payment_last_month_ytd' => $validated['payment_last_month_ytd'] ?? null,
                'payment_last_month_date' => $validated['payment_last_month_date'] ?? null,
                'actual_payment' => $validated['actual_payment'] ?? null,
                'actual_payment_ytd' => $validated['actual_payment_ytd'] ?? null,
                'actual_payment_date' => $validated['actual_payment_date'] ?? null,
                'plan_payment' => $validated['plan_payment'] ?? null,
                'plan_payment_ytd' => $validated['plan_payment_ytd'] ?? null,
                'plan_payment_date' => $validated['plan_payment_date'] ?? null,
                'pending_billing' => $validated['pending_billing'] ?? null,
                'pending_billing_ytd' => $validated['pending_billing_ytd'] ?? null,
                'pending_billing_date' => $validated['pending_billing_date'] ?? null,
                'total_sales' => $validated['total_sales'] ?? null,
                'total_sales_ytd' => $validated['total_sales_ytd'] ?? null,
                'total_sales_date' => $validated['total_sales_date'] ?? null,
    
                'status_pkps' => $validated['status_pkps'],
                'business_type' => $validated['business_type'],
                'bouwhere' => $validated['bouwhere'],
                'payment_trend' => $validated['payment_trend'],
                'commodity_potential' => $validated['commodity_potential'],
                'business_prospect' => $validated['business_prospect'],
            ]);
    
            if ($request->has('data')) {
                foreach ($request->data as $aging => $item) {
                    if (!empty($item['nilai']) || !empty($item['plan'])) {
                        OpenblockAging::create([
                            'open_block_id' => $openblock->id,
                            'aging' => $aging,
                            'nilai' => $item['nilai'] ?? null,
                            'plan' => $item['plan'] ?? null,
                            'tanggal' => $item['tanggal'] ?? null,
                            'cara_bayar' => $item['payment_method'] ?? null, // FIXED TYPO
                        ]);
                    }
                }
            }
    
            // Kirim email sebelum commit
            $persetujuan = User::where('jabatan', 'cs ho')->get();
            foreach ($persetujuan as $manager) {
                Mail::to($manager->email)->send(new OpenBlockSubmitted($openblock));
                
                // Tambahkan log untuk mencatat keberhasilan pengiriman email
                Log::info('Email berhasil dikirim ke: ' . $manager->email);
            }
    
            DB::commit();
            
            // Tambahkan log untuk mencatat keberhasilan
            Log::info('Data berhasil disimpan untuk OpenBlock ID: ' . $openblock->id);
            
            return redirect()->route('admin.datacustomer')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan data atau mengirim email', [
                'message' => $e->getMessage(), 
            ]);
            return back()->withErrors([
                'msg' => 'Gagal menyimpan data: ' . $e->getMessage(), 
            ]);
        }
    }

    public function approve($id)
    {
        $openblock = OpenBlock::findOrFail($id);
        $persetujuan = Approval::where('id_openblock', $id)->get();
        return view('pages.komite.persetujuan', compact('openblock', 'persetujuan'));
    }


    public function storeapprove(Request $request, $id)
    {
        $openblock = OpenBlock::findOrFail($id);

        // Ambil aging tertinggi dari OpenblockAging
        $agings = OpenblockAging::where('open_block_id', $id)->pluck('aging')->toArray();

        // Urutkan prioritas aging
        $agingPriority = [
            '1 - 30' => 1,
            '31 - 60' => 2,
            '61 - 90' => 3,
            '90 up'   => 4,
        ];

        $maxAging = 0;
        foreach ($agings as $aging) {
            if (isset($agingPriority[$aging]) && $agingPriority[$aging] > $maxAging) {
                $maxAging = $agingPriority[$aging];
            }
        }

        // Simpan approval
        Approval::create([
            'id_openblock' => $id,
            'id_user' => Auth::user()->id,
            'komentar' => $request->komentar,
            'dokumen_type' => 'openblock',
            'level' => $maxAging,
        ]);

                // === Alur approval baru ===
        // Urutkan prioritas aging
        $agingPriority = [
            '1 - 30' => 1,
            '31 - 60' => 2,
            '61 - 90' => 3,
            '90 up'   => 4,
        ];

        $maxAging = 0;
        foreach ($agings as $aging) {
            if (isset($agingPriority[$aging]) && $agingPriority[$aging] > $maxAging) {
                $maxAging = $agingPriority[$aging];
            }
        }

        // Simpan approval
        Approval::create([
            'id_openblock' => $id,
            'id_user' => Auth::user()->id,
            'komentar' => $request->komentar,
            'dokumen_type' => 'openblock',
            'level' => $maxAging,
        ]);

        // === Alur approval baru dengan CS HO ===
        if (Auth::user()->jabatan == 'cs ho') {
            // Kirim ke Manager Sales
            $nextApprovers = User::where('jabatan', 'manager sales')->get();
            foreach ($nextApprovers as $approver) {
                Mail::to($approver->email)->send(new OpenBlockSubmitted($openblock));
            }

        } elseif (Auth::user()->jabatan == 'manager sales') {
            // Kirim ke GM Sales
            $nextApprovers = User::where('jabatan', 'gm sales')->get();
            foreach ($nextApprovers as $approver) {
                Mail::to($approver->email)->send(new OpenBlockSubmitted($openblock));
            }

        } elseif (Auth::user()->jabatan == 'gm sales') {
            // Kirim ke Credit
            $nextApprovers = User::where('jabatan', 'credit')->get();
            foreach ($nextApprovers as $approver) {
                Mail::to($approver->email)->send(new OpenBlockSubmitted($openblock));
            }

        } elseif (Auth::user()->jabatan == 'credit') {
            if ($maxAging <= 2) {
                $openblock->update(['status' => 'selesai']);
            } elseif ($maxAging == 3 || $maxAging == 4) {
                $nextApprovers = User::where('jabatan', 'manager finance')->get();
                foreach ($nextApprovers as $approver) {
                    Mail::to($approver->email)->send(new OpenBlockSubmitted($openblock));
                }
            }

        } elseif (Auth::user()->jabatan == 'manager finance') {
            if ($maxAging == 3) {
                $openblock->update(['status' => 'selesai']);
            } elseif ($maxAging == 4) {
                $nextApprovers = User::where('jabatan', 'gm finance')->get();
                foreach ($nextApprovers as $approver) {
                    Mail::to($approver->email)->send(new OpenBlockSubmitted($openblock));
                }
            }

        } elseif (Auth::user()->jabatan == 'gm finance') {
            $nextApprovers = User::where('jabatan', 'presiden direktur')->get();
            foreach ($nextApprovers as $approver) {
                Mail::to($approver->email)->send(new OpenBlockSubmitted($openblock));
            }

        } elseif (Auth::user()->jabatan == 'presiden direktur') {
            $openblock->update(['status' => 'selesai']);
        }

        return redirect()->route('komite.home')->with('success', 'Persetujuan telah diproses.');
    }

    public function getBlocksByMonth(Request $request)
    {
        $bulanTahun = $request->input('bulan_tahun'); // format: YYYY-MM

        // Ambil semua OpenBlock (bisa difilter lebih spesifik jika perlu)
        $blocks = OpenBlock::all();

        $matchingBlocks = [];
        foreach ($blocks as $block) {
            $blockDates = [
                'block1_date' => $block->block1_date,
                'block2_date' => $block->block2_date,
                'block3_date' => $block->block3_date,
                'block4_date' => $block->block4_date,
            ];

            foreach ($blockDates as $key => $blockDate) {
                if ($blockDate) {
                    $blockMonth = \Carbon\Carbon::parse($blockDate)->format('Y-m');
                    if ($blockMonth === $bulanTahun) {
                        $matchingBlocks[] = [
                            'block' => $block,
                            'block_name' => $key,
                            'block_date' => $blockDate,
                        ];
                    }
                }
            }
        }

        return view('pages.admin.form_openblock', compact('matchingBlocks', 'bulanTahun'));
    }
}
