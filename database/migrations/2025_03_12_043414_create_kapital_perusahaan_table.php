<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kapital_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nak_id')->constrained('naks')->onDelete('cascade');
            $table->decimal('ratarata_penjualan_perbulan', 15, 2);
            $table->decimal('hasil_penjualan_pertahun', 15, 2);
            $table->text('keterangan');
            $table->string('cara_pembayaran');
            $table->string('model_transaksi');
            $table->text('fasilitas');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kapital_perusahaan');
    }
};