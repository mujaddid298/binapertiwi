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
        Schema::create('persetujuan_nak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nak_id')->constrained('naks')->onDelete('cascade');
            $table->foreignId('komite_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['tertunda', 'disetujui', 'disetujui dengan syarat', 'ditolak'])->default('tertunda');
            $table->text('komen')->nullable();
            $table->date('tanggal_persetujuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan_nak');
    }
};