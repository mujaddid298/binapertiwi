<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenBlock extends Model
{
    use HasFactory;

    protected $table = 'open_blocks';

    protected $fillable = [
        'customer_id',
        'tanggal',
        'diajukan',
        'cabang',
        'customer_group',
        'tier_risk',
        'plafond',
        'payment_method',
        'payment_date',
        'nilai_piutang',
        'bulan_tahun',
        'block1_amount',
        'block1_total',
        'block1_date',
        'block2_amount',
        'block2_total',
        'block2_date',
        'block3_amount',
        'block3_total',
        'block3_date',
        'block4_amount',
        'block4_total',
        'block4_date',
        'total_amount',
        'total_ytd',
        'payment_last_month',
        'payment_last_month_ytd',
        'payment_last_month_date',
        'actual_payment',
        'actual_payment_ytd',
        'actual_payment_date',
        'plan_payment',
        'plan_payment_ytd',
        'plan_payment_date',
        'pending_billing',
        'pending_billing_ytd',
        'pending_billing_date',
        'total_sales',
        'total_sales_ytd', 
        'status_pkps',
        'business_type',
        'bouwhere',
        'payment_trend',
        'commodity_potential',
        'business_prospect',
    ];

    public function agings()
    {
        return $this->hasMany(OpenBlockAging::class, 'open_block_id');
    }

    public function persetujuan()
    {
        return $this->hasMany(Persetujuan::class, 'open_block_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
