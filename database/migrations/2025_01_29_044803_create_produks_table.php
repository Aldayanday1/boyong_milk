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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->decimal('harga', 10, 2);
            $table->string('kategori');
            $table->string('gambar')->nullable(); // Untuk gambar produk
            $table->date('tgl_produksi');
            $table->date('tgl_kadaluarsa');
            $table->string('berat_isi_bersih');
            $table->enum('status_produk', ['tersedia', 'habis', 'pre_order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
