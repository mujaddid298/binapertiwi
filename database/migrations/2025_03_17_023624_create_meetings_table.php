<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->text('description');
            $table->boolean('status')->default(false); // Default meeting belum diumumkan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};