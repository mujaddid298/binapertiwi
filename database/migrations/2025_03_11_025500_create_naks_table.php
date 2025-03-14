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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('cabang');
            $table->date('tanggal');
            $table->string('nama_bc');
            $table->string('perusahaan_pelanggan');
            $table->text('pengajuan_kredit');
            $table->text('karakter_perusahaan');
            $table->text('kapital_perusahaan');
            $table->text('kapasitas_perusahaan');
            $table->text('kondisi_makro_lingkungan');
            $table->text('lampiran')->nullable();
            $table->decimal('nilai_kredit', 15, 2)->nullable();
            $table->text('analisa_tim_kredit')->nullable();
            $table->enum('status', ['tertunda', 'disetujui', 'disetujui dengan syarat', 'ditolak'])->default('tertunda');
            $table->decimal('nilai_kredit', 15, 2);
            $table->string('pembayaran');
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
        Schema::dropIfExists('naks');
    }
};