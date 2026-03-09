<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade');
        $table->date('tanggal_peminjaman');
        $table->date('tanggal_pengembalian');
        $table->enum('status', ['menunggu', 'dipinjam', 'dikembalikan', 'ditolak','diajukan'])->default('menunggu'); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
