<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'industry',
        'bidang_usaha',
        'group_perusahaan',
        'penanggung_jawab',
        'kapital_perusahaan_id',
        'kapasitas_perusahaan_id',
        'nak_id',
        'status',
        'cluster_customer',
        'customer_reference',
    ];

// Customer.php
public function nak()
{
    return $this->belongsTo(Nak::class, 'nak_id'); // foreign key di tabel customers
}

public function agingAr()
{
    return $this->hasMany(AgingAr::class, 'customer_id');
}

public function billingDocuments()
{
    return $this->hasMany(BillingDocument::class, 'customer_id'); // foreign key di tabel billing_documents
}

}
