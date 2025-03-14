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
        Schema::create('karakters', function (Blueprint $table) {
            $table->id();
            $table->string('bentuk_perusahaan');
            $table->date('waktu_didirikan');
            $table->string('akte_perubahan');
            $table->date('pengesahan');
            $table->string('menteri_kehakiman');
            $table->string('domisili');
            $table->string('notaris');
            $table->decimal('modal_dasar', 15, 2);
            $table->foreignId('modal_disetor_id')->constrained('modal_disetors')->onDelete('cascade');
            $table->integer('umur_perusahaan');
            $table->text('struktur_organisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karakters');
    }
};
