<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgingAr extends Model
{
    use HasFactory;

    protected $table = 'aging_ar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_id',
        'billing_id',
        'aging_ar',
        'gl_account',
        'transaction_type',
        'document_type',
        'document_date',
        'posting_date',
        'net_due_date',
        'arrears_by_net_due_date',
        'aging_ar_days',
        'aging_psak_days',
        'currency',
        'amount_in_dc',
        'amount_in_lc',
        'paid',
        'outstanding_ar',
        'provision_pct_ar',
        'provision_amt_ar',
        'ar_after_provision_ar',
        'provision_pct_psak',
        'provision_amt_psak',
        'ar_after_provision_psak',
        'sales_organization',
        'risk_rating',
        'tiers',
    ];
 
    // Relationship with Nak model
    public function nak()
    {
        return $this->belongsTo(Nak::class);
    }

    // Relationship with Customer model
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }

    public function billingDocument()
    {
        return $this->belongsTo(BillingDocument::class, 'billing_id', 'billing_id');
    }
} 