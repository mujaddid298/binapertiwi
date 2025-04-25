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
            $table->foreignId('hubungan_bank_id')->constrained('hubungan_banks')->onDelete('cascade');
            $table->foreignId('reputasi_id')->constrained('reputasis')->onDelete('cascade');
            $table->foreignId('usaha_sampingan_id')->constrained('usaha_sampingans')->onDelete('cascade');
            $table->foreignId('req_suku_cadang_id')->constrained('req_suku_cadangs')->onDelete('cascade');

            $table->string('status_piutang');
            $table->string('kategori_piutang');
            $table->string('pengalaman_pembayaran');
        
            $table->timestamps();
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