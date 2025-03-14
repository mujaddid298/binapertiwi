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
        Schema::create('pengajuan_kredit', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_kredit', 15, 2);
            $table->string('syarat_pembayaran');
            $table->decimal('persen_bunga', 5, 2);
            $table->text('deskripsi_jaminan');
            $table->timestamps();
        });        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kredit');
    }
};