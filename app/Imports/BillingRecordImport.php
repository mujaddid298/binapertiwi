<?php

namespace App\Imports;

use App\Models\BillingRecord;
use App\Models\BillingDocument;
use App\Models\AgingAr;
use App\Models\DocumentReceipt;
use App\Models\PaymentTarget;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BillingRecordImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function chunkSize(): int
    {
        return 100;
    }

    public function model(array $row)
    {

        set_time_limit(30);

        $row = $this->normalizeKeys($row);
        
        //dd($row);
        //dd(array_keys($row)); // Melihat semua nama kolom setelah dinormalisasi

        $customerName = $row['customer_name'] ?? null;

        if (empty($customerName)) {
            return null;
        }

        $existingCustomerByName = Customer::where('nama', $customerName)->first();

        if ($existingCustomerByName) {
            $customer = $existingCustomerByName;
        } else {
            $customer = Customer::create([
                'nama' => $customerName,
                'industry' => $row['industry_key'] ?? null,
                'group_perusahaan' => $row['group'] ?? null,
                'customer_reference' => $row['customer_reference'] ?? null,
            ]);
        }
        // 1. BillingDocument
        // Validasi awal: pastikan billing_document tersedia dan tidak kosong
        if (empty($row['billing_document'])) {
            //Log::warning('Lewati baris karena billing_document kosong atau tidak ditemukan.', $row);
            return null;
        }

        $billingDocument = BillingDocument::updateOrCreate(
            ['billing_id' => $row['billing_document']],
            [
                'customer_id'        => $customer->id,
                'document_number'    => $row['document_number'] ?? null,
                'assignment'         => $row['assignment'] ?? null,
                'plant'              => $row['plant'] ?? null,
                'sales_office'       => $row['sales_office'] ?? null,
                'business_area'      => $row['business_area'] ?? null,
                
            ]
        );

        //dd($customer->id);

        // 2. Aging AR
        AgingAr::create([
            'customer_id'=> $customer->id,
            'aging_ar' => $row['aging_ar'],
            'billing_id' => $billingDocument->billing_id,
            'gl_account' => $row['gl_account'] ?? null,
            'transaction_type' => $row['transaction_type'] ?? null,
            'document_type' => $row['document_type'] ?? null,
            'document_date' => $this->parseDate($row['document_date'] ?? null),
            'posting_date' => $this->parseDate($row['posting_date'] ?? null),
            'net_due_date' => $this->parseDate($row['net_due_date'] ?? null),
            'arrears_by_net_due_date' => $row['arrears_by_net_due_date'] ?? null,
            'currency' => $row['document_currency'] ?? null,
            'amount_in_dc' => $this->parseNumber($row['amount_in_dc'] ?? null),
            'amount_in_lc' => $this->parseNumber($row['amount_in_lc'] ?? null),
            'paid' => $this->parseNumber($row['paid'] ?? null),
            'outstanding_ar' => $this->parseNumber($row['outstanding_ar'] ?? null),
            'provision_pct_ar' => $this->parseNumber($row['prosentase_provisi_aging_ar'] ?? null),
            'provision_amt_ar' => $this->parseNumber($row['amount_provisi_aging_ar'] ?? null),
            'ar_after_provision_ar' => $this->parseNumber($row['ar_after_provisi_aging_ar'] ?? null),
            'provision_pct_psak' => $this->parseNumber($row['prosentase_provisi_aging_psak'] ?? null),
            'provision_amt_psak' => $this->parseNumber($row['amount_provisi_aging_psak'] ?? null),
            'ar_after_provision_psak' => $this->parseNumber($row['ar_after_provisi_aging_psak'] ?? null),

            'sales_organization' => $row['sales_organization'] ?? null,
            'risk_rating'        => $row['risk_r'] ?? null,
            'tiers'              => $row['tiers'] ?? null,
        ]);

        // 3. DocumentReceipt
        DocumentReceipt::create([
            'billing_id' => $billingDocument->billing_id,
            'tanda_terima_customer_no' => $row['nomor_tanda_terima_customer'] ?? null,
            'tanggal_terima_internal' => $this->parseDate($row['tanggal_terima_document_internal'] ?? null),
            'tanggal_terima_customer' => $this->parseDate($row['tanggal_document_terima_customer'] ?? null),
            'pic_penerima_customer' => $row['pic_penerima_customer'] ?? null,
            'status_document' => $row['status_document'] ?? null,
            'sla_document_tagihan' => $row['sla_document_tagihan'] ?? null,
        ]);

        // 4. PaymentTarget
        PaymentTarget::create([
            'billing_id' => $billingDocument->billing_id,
            'tanggal_target_cashin_ttc' => $this->parseDate($row['tanggal_target_cash_in_by_ttc'] ?? null),
            'amount_target_cashin_ttc' => $this->parseNumber($row[''] ?? null),
            'sales_employee' => $row['sales_employee'] ?? null,
            'tanggal_target_cashin_row_material' => $this->parseDate($row['tanggal_target_cash_in_by_row_material'] ?? null),
            'amount_target_cashin_row_material' => $this->parseNumber($row['amount_target_cash_in_by_row_material'] ?? null),
            'term_of_payment' => $row['term_of_payment'] ?? null,
        ]);
    }

    private function normalizeKeys(array $row)
    {
        $normalized = [];
        foreach ($row as $key => $value) {
            // Lowercase, trim, ganti spasi dengan underscore
            $cleanKey = strtolower(trim(preg_replace('/\s+/', '_', $key)));
            $normalized[$cleanKey] = $value;
        }
        return $normalized;
    }

    private function parseDate($value)
{
    // Bersihkan spasi di awal/akhir
    $value = trim($value);

    // Jika kosong, kembalikan null
    if (!$value) return null;

    // Tangani jika input berupa angka serial Excel (contoh: 45709)
    if (is_numeric($value) && intval($value) > 30000 && intval($value) < 60000) {
        // Excel ke Unix Timestamp: (ExcelDate - 25569) * 86400
        $timestamp = ($value - 25569) * 86400;
        return date('Y-m-d', $timestamp);
    }

    // Coba dengan format tertentu
    $formats = ['d/m/Y', 'Y-m-d', 'd-m-Y', 'm/d/Y', 'Y/m/d', 'd.m.Y'];
    foreach ($formats as $format) {
        try {
            $date = \Carbon\Carbon::createFromFormat($format, $value);
            if ($date && $date->format($format) === $value) {
                return $date->format('Y-m-d');
            }
        } catch (\Exception $e) {
            // Log optional untuk debugging
            // \Log::warning("Gagal parse format khusus: $value dengan format $format", ['error' => $e->getMessage()]);
        }
    }

    // Fallback dengan Carbon::parse
    try {
        $date = \Carbon\Carbon::parse($value);
        return $date->format('Y-m-d');
    } catch (\Exception $e) {
        // Log optional
        // \Log::error("Gagal parse fallback tanggal: $value", ['error' => $e->getMessage()]);
        return null;
    }
}

    private function parseNumber($value)
    {
        // Bersihkan spasi
        $value = trim($value);
    
        // Cek apakah numeric
        if (is_numeric($value)) {
            return $value + 0; // paksa ke integer atau float
        }
    
        // Jika nilai tidak valid seperti 'CURRENT', 'N/A', '-', kosong, dll
        $invalidValues = ['CURRENT', 'N/A', '-', '', null];
    
        if (in_array(strtoupper($value), $invalidValues)) {
            return null;
        }
    
        // Coba parsing angka dengan koma sebagai pemisah ribuan
        $value = str_replace(',', '', $value);
        if (is_numeric($value)) {
            return $value + 0;
        }
    
        return null; // fallback jika tetap tidak valid
    }

    
}