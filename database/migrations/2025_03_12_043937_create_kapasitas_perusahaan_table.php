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
            $table->unsignedBigInteger('reputasi_id');
            $table->unsignedBigInteger('usaha_sampingan_id');
            $table->unsignedBigInteger('req_suku_cadang_id');

            $table->string('status_piutang');
            $table->string('kategori_piutang');
            $table->string('pengalaman_pembayaran');
        
            $table->timestamps();

            $table->foreign('hubungan_bank_id')->references('id')->on('hubungan_banks')->onDelete('cascade');
            $table->foreign('reputasi_id')->references('id')->on('reputasis ')->onDelete('cascade');
            $table->foreign('usaha_sampingan_id')->references('id')->on('usaha_sampingan ')->onDelete('cascade');
            $table->foreign('req_suku_cadang_id')->references('id')->on('req_suku_cadangs ')->onDelete('cascade');

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