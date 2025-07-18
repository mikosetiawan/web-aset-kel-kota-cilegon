<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset');
            $table->foreignId('kategori_id')->constrained('kategori_asets')->onDelete('cascade');
            $table->integer('jumlah');
            $table->enum('kondisi', ['Baik', 'Rusak', 'Perlu Perbaikan']);
            $table->date('tanggal_pembelian');
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};