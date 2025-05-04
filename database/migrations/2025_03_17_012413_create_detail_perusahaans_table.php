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
        Schema::create('detail_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->onDelete('cascade'); 
            $table->string('bentuk_perusahaan');
            $table->date('waktu_didirikan');
            $table->string('akte_perubahan');
            $table->string('pengesahan');
            $table->string('manajemen_kehakiman');
            $table->string('domisili');
            $table->string('notaris');
            $table->string('umur_perusahaan');
            $table->string('struktur_organisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perusahaans');
    }
};
