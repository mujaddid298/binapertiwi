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