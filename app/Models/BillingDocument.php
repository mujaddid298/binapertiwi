<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingDocument extends Model
{
    protected $table = 'billing_documents';
    protected $primaryKey = 'billing_id';
    public $incrementing = false; // karena billing_id VARCHAR

    protected $fillable = [
        'billing_id',
        'customer_id',
        'document_number',
        'assignment',
        'plant',
        'sales_office',
        'business_area',
        'sales_organization',
        'group_name',
        'risk_rating',
        'tiers',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}