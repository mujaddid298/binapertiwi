<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingRecord extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'billing_document',
        'document_number',
        'assignment',
        'plant',
        'sales_office',
        'business_area',
        'sales_org',
        'group',
        'risk_r',
        'tiers',
        'cluster_customer',
        'customer_reference',
        'gl_account',
        'transaction_type',
        'document_type',
        'document_date',
        'posting_date',
        'net_due_date',
        'arrears_by_net_due_date',
        'aging_ar',
        'aging_psak',
        'document_currency',
        'amount_in_dc',
        'amount_in_lc',
        'paid',
        'outstanding_ar',
        'provision_percent_ar',
        'provision_amount_ar',
        'ar_after_provision_ar',
        'provision_percent_psak',
        'provision_amount_psak',
        'ar_after_provision_psak',
        'customer_receipt_number',
        'internal_doc_receive_date',
        'customer_doc_receive_date',
        'customer_receiver_pic',
        'document_status',
        'sla_billing_doc',
        'target_cashin_date_ttc',
        'sales_employee',
        'target_cashin_amount_ttc',
        'target_cashin_date_row',
        'target_cashin_amount_row',
        'term_of_payment'
    ];

    protected $casts = [
        'document_date' => 'date',
        'posting_date' => 'date',
        'net_due_date' => 'date',
        'internal_doc_receive_date' => 'date',
        'customer_doc_receive_date' => 'date',
        'target_cashin_date_ttc' => 'date',
        'target_cashin_date_row' => 'date',
    ];
}
