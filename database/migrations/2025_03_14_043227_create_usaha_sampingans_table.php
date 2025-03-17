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
        Schema::create('usaha_sampingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kapasitas_perusahaan_id')->constrained()->onDelete('cascade');

            $table->string('nama');
            $table->string('alamat');
            $table->string('bidang_usaha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_sampingans');
    }
};
