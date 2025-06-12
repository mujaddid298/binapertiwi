<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('openbloks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('cabang');
            $table->string('customer_code');
            $table->string('tier_risk');
            $table->string('customer_group');
            $table->string('plafond');
            $table->string('payment_period');
            $table->string('payment_amount');
            $table->string('payment_method');
            $table->date('payment_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('openbloks');
    }
}; 