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
            $table->string('penjualan_perbulan');
            $table->string('penjualan_pertahun');
            $table->text('keterangan');
            $table->string('pembayaran');
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