<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentReceipt extends Model
{
    protected $table = 'document_receipts';
    protected $primaryKey = 'receipt_id';

    protected $fillable = [
        'billing_id',
        'tanda_terima_customer_no',
        'tanggal_terima_internal',
        'tanggal_terima_customer',
        'pic_penerima_customer',
        'status_document',
        'sla_document_tagihan',
    ];

    public function billingDocument()
    {
        return $this->belongsTo(BillingDocument::class, 'billing_id', 'billing_id');
    }
}
