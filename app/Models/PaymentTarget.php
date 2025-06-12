<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTarget extends Model
{
    protected $table = 'payment_targets';
    protected $primaryKey = 'target_id';

    protected $fillable = [
        'billing_id',
        'tanggal_target_cashin_ttc',
        'amount_target_cashin_ttc',
        'sales_employee',
        'tanggal_target_cashin_row_material',
        'amount_target_cashin_row_material',
        'term_of_payment',
    ];

    public function billingDocument()
    {
        return $this->belongsTo(BillingDocument::class, 'billing_id', 'billing_id');
    }
}
