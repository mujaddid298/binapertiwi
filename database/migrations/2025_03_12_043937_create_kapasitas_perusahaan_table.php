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
        Schema::create('kapasitas_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hubungan_bank_id');

            $table->string('hasil_pengecekan_reputasi');
            $table->string('sumber_informasi');
            $table->string('hubungan');
            $table->string('hasil_pengecekan');
            $table->string('status_piutang');
            $table->string('kategori_piutang');
            $table->string('pengalaman_pembayaran');
            $table->string('usaha_lainnya_nama');
            $table->string('usaha_lainnya_alamat');
            $table->string('usaha_lainnya_bidang_usaha');
            $table->text('analisa_kebutuhan');
            $table->string('model_alat');
            $table->year('tahun_buat');
            $table->integer('jumlah');
            $table->string('lokasi');
            $table->text('perhitungan_kebutuhan');
            $table->timestamps();


            $table->foreign('hubungan_bank_id')->references('id')->on('hubungan_banks')->onDelete('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kapasitas_perusahaan');
    }
};