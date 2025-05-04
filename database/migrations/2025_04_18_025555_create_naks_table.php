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
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('persetujuan_nak_id')->nullable()->constrained('persetujuan_nak')->nullOnDelete();

            $table->string('cabang');
            $table->date('tanggal');
            $table->string('nama_bc');
            $table->text('komentar')->nullable();

            $table->text('makro_lingkungan')->nullable();
            $table->text('lampiran')->nullable();
            $table->decimal('nilai_kredit', 15, 2)->nullable();
            $table->string('term_of_payment')->nullable();
            $table->string('bunga')->nullable();
            $table->string('jaminan')->nullable();

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