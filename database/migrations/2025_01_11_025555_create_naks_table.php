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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cutomer_id');
            $table->unsignedBigInteger('pengajuan_kredit_id'); 
            $table->unsignedBigInteger('persetujuan_nak_id');
            $table->unsignedBigInteger('analisa_kcs_id');
            $table->unsignedBigInteger('analisa_khs_id');

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


            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pengajuan_kredit_id')->references('id')->on('pengajuan_kredit')->onDelete('cascade');
            $table->foreign('persetujuan_nak_id')->references('id')->on('persetujuan_naks')->onDelete('cascade');
            $table->foreign('analisa_kc_id')->references('id')->on('analisa_kcs')->onDelete('cascade');
            $table->foreign('analisa_kh_id')->references('id')->on('analisa_khs')->onDelete('cascade');
          

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