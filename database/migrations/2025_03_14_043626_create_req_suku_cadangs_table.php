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
            Schema::create('req_suku_cadangs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('kapasitas_perusahaan_id')->references('id')->on('kapasitas_perusahaan')->onDelete('cascade');
                $table->string('model_alat');
                $table->year('tahun_buat');
                $table->integer('jumlah');
                $table->string('lokasi');
                $table->text('perhitungan_kebutuhan');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('req_suku_cadangs');
    }
};
