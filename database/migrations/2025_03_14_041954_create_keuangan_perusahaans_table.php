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
        Schema::create('keuangan_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karakter_perusahaan_id')->constrained('karakter_perusahaan')->onDelete('cascade');
            $table->decimal('modal_dasar', 15, 2);
            $table->decimal('modal_disetor', 15, 2);
            $table->string('nama');
            $table->string('jabatan');
            $table->integer('saham');
            $table->decimal('nilai_saham', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan_perusahaans');
    }
};
