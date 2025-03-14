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
        Schema::create('nilai_kredit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nak_id')->constrained('naks')->onDelete('cascade');
            $table->decimal('nilai_kredit', 15, 2);
            $table->string('term_of_payment');
            $table->decimal('bunga', 5, 2);
            $table->text('jaminan');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_kredit');
    }
};