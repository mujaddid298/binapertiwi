<?php

namespace App\Http\Controllers;

use App\Models\AgingAr;
use App\Models\BillingDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgingArController extends Controller
{
    public function index()
    {
        // Update aging_ar_days secara otomatis
        $this->updateAgingDays();
        
        $agingData = AgingAr::with(['billingDocument', 'customer'])
            ->select([
                'aging_ar',
                'billing_id',
                'document_date',
                'net_due_date',
                'outstanding_ar',
                'aging_ar_days'
            ])
            ->get()
            ->groupBy(function($item) {
                return $item->billingDocument->sales_organization ?? 'Unknown';
            })
            ->map(function($group) {
                return [
                    'current' => $group->where('aging_ar_days', '<=', 0)->sum('outstanding_ar'),
                    'days_1_30' => $group->whereBetween('aging_ar_days', [1, 30])->sum('outstanding_ar'),
                    'days_31_60' => $group->whereBetween('aging_ar_days', [31, 60])->sum('outstanding_ar'),
                    'days_61_90' => $group->whereBetween('aging_ar_days', [61, 90])->sum('outstanding_ar'),
                    'days_91_120' => $group->whereBetween('aging_ar_days', [91, 120])->sum('outstanding_ar'),
                    'days_over_120' => $group->where('aging_ar_days', '>', 120)->sum('outstanding_ar')
                ];
            });

        return view('pages.admin.home', compact('agingData'));
    }

    // Fungsi untuk update aging days secara otomatis
    private function updateAgingDays()
    {
        $today = Carbon::now();
        
        DB::table('aging_ar')
            ->where('outstanding_ar', '>', 0)
            ->update([
                'aging_ar_days' => DB::raw("DATEDIFF('$today', net_due_date)")
            ]);
    }

    // Fungsi untuk mendapatkan ringkasan aging
    public function getAgingSummary()
    {
        $summary = AgingAr::select(
            DB::raw('SUM(CASE WHEN aging_ar_days <= 0 THEN outstanding_ar ELSE 0 END) as current'),
            DB::raw('SUM(CASE WHEN aging_ar_days BETWEEN 1 AND 30 THEN outstanding_ar ELSE 0 END) as days_1_30'),
            DB::raw('SUM(CASE WHEN aging_ar_days BETWEEN 31 AND 60 THEN outstanding_ar ELSE 0 END) as days_31_60'),
            DB::raw('SUM(CASE WHEN aging_ar_days BETWEEN 61 AND 90 THEN outstanding_ar ELSE 0 END) as days_61_90'),
            DB::raw('SUM(CASE WHEN aging_ar_days BETWEEN 91 AND 120 THEN outstanding_ar ELSE 0 END) as days_91_120'),
            DB::raw('SUM(CASE WHEN aging_ar_days > 120 THEN outstanding_ar ELSE 0 END) as days_over_120')
        )->first();

        return $summary;
    }

    // Fungsi untuk mendapatkan peringatan aging
    public function getAgingAlerts()
    {
        $alerts = AgingAr::with(['billingDocument.customer'])
            ->where('outstanding_ar', '>', 0)
            ->where('aging_ar_days', '>', 30)
            ->orderBy('aging_ar_days', 'desc')
            ->get()
            ->map(function($item) {
                return [
                    'customer_name' => $item->billingDocument->customer->nama ?? 'Unknown',
                    'document_number' => $item->billingDocument->document_number ?? 'Unknown',
                    'outstanding_amount' => $item->outstanding_ar,
                    'days_overdue' => $item->aging_ar_days,
                    'due_date' => $item->net_due_date
                ];
            });

        return $alerts;
    }

    public function calculateAging($documentDate, $netDueDate)
    {
        $today = Carbon::now();
        $docDate = Carbon::parse($documentDate);
        $dueDate = Carbon::parse($netDueDate);
        
        // Calculate days between document date and due date
        $creditPeriod = $docDate->diffInDays($dueDate);
        
        // Calculate days overdue
        $daysOverdue = $today->diffInDays($dueDate);
        
        // Initialize aging categories
        $aging = [
            'current' => 0,
            'days_1_30' => 0,
            'days_31_60' => 0,
            'days_61_90' => 0,
            'days_91_120' => 0,
            'days_over_120' => 0
        ];
        
        // Categorize based on days overdue
        if ($daysOverdue <= 0) {
            $aging['current'] = $daysOverdue;
        } elseif ($daysOverdue <= 30) {
            $aging['days_1_30'] = $daysOverdue;
        } elseif ($daysOverdue <= 60) {
            $aging['days_31_60'] = $daysOverdue;
        } elseif ($daysOverdue <= 90) {
            $aging['days_61_90'] = $daysOverdue;
        } elseif ($daysOverdue <= 120) {
            $aging['days_91_120'] = $daysOverdue;
        } else {
            $aging['days_over_120'] = $daysOverdue;
        }
        
        return [
            'credit_period' => $creditPeriod,
            'days_overdue' => $daysOverdue,
            'aging_categories' => $aging
        ];
    }

    public function getCustomerAging($customerId)
    {
        $agingData = AgingAr::with(['billingDocument'])
            ->whereHas('billingDocument', function($query) use ($customerId) {
                $query->where('customer_id', $customerId);
            })
            ->select([
                'aging_ar',
                'billing_id',
                'document_date',
                'net_due_date',
                'outstanding_ar',
                'aging_ar_days'
            ])
            ->get()
            ->groupBy(function($item) {
                return $item->billingDocument->sales_organization ?? 'Unknown';
            })
            ->map(function($group) {
                return [
                    'current' => $group->where('aging_ar_days', '<=', 0)->sum('outstanding_ar'),
                    'days_1_30' => $group->whereBetween('aging_ar_days', [1, 30])->sum('outstanding_ar'),
                    'days_31_60' => $group->whereBetween('aging_ar_days', [31, 60])->sum('outstanding_ar')
                ];
            });

        return $agingData;
    }
}
