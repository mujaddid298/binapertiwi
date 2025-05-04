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
        Schema::create('hubungan_banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kapasitas_perusahaan_id')->references('id')->on('kapasitas_perusahaan')->onDelete('cascade');
            $table->string('nama_lembaga');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubungan_banks');
    }
};
