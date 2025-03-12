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
        Schema::create('perusahaan_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nak_id')->constrained('naks')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->string('industry');
            $table->string('bidang_usaha');
            $table->string('group_perusahaan');
            $table->string('penanggung_jawab');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_pelanggan');
    }
};