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
            $table->unsignedBigInteger('karakter_id');
            $table->unsignedBigInteger('kapital_perusahaan_id');
            $table->unsignedBigInteger('kapasitas_perusahaan_id');

            $table->string('cabang');
            $table->date('tanggal');
            $table->string('nama_bc');

 
            $table->text('kapasitas_perusahaan');
            $table->text('kondisi_makro_lingkungan');
            $table->text('lampiran')->nullable();
            $table->decimal('nilai_kredit', 15, 2)->nullable();
            $table->text('analisa_tim_kredit')->nullable();
            $table->enum('status', ['tertunda', 'disetujui', 'disetujui dengan syarat', 'ditolak'])->default('tertunda');
            $table->decimal('nilai_kreditt', 15, 2);
            $table->string('pembayaran');
            $table->decimal('bunga', 5, 2);
            $table->text('jaminan');
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pengajuan_kredit_id')->references('id')->on('pengajuan_kredit')->onDelete('cascade');
            $table->foreign('karakter_id')->references('id')->on('karakters')->onDelete('cascade');
            $table->foreign('kapital_perusahaan_id')->references('id')->on('kapital_perusahaan')->onDelete('cascade');
            $table->foreign('kapasitas_perusahaan_id')->references('id')->on('kapasitas_perusahaan')->onDelete('cascade');

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