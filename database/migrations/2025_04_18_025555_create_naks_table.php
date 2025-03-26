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
        Schema::create('naks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pengajuan_kredit_id')->constrained('pengajuan_kredit')->onDelete('cascade');
            $table->foreignId('persetujuan_nak_id')->constrained('persetujuan_nak')->onDelete('cascade');
            $table->foreignId('analisa_kc_id')->constrained('analisa_kcs')->onDelete('cascade');
            $table->foreignId('analisa_kh_id')->constrained('analisa_khs')->onDelete('cascade');

            $table->string('cabang');
            $table->date('tanggal');
            $table->string('nama_bc');
            $table->string('komentar');

            $table->text('makro_lingkungan');
            $table->text('lampiran')->nullable();
            $table->decimal('nilai_kredit', 15, 2)->nullable();
            $table->string('term_of_payment');
            $table->string('bunga');
            $table->string('jaminan');

            $table->text('analisa_tim_kredit')->nullable();

            $table->enum('status', ['tertunda', 'disetujui', 'disetujui dengan syarat', 'ditolak'])->default('tertunda');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naks');
    }
};