<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel galleries.
     * Tabel ini menyimpan galeri kegiatan dan dokumentasi laboratorium.
     */
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul galeri');
            $table->text('description')->comment('Deskripsi galeri');
            $table->string('image_path')->comment('Path file gambar');
            $table->enum('type', ['kegiatan', 'dokumentasi'])->comment('Tipe galeri');
            $table->date('event_date')->comment('Tanggal acara');
            $table->boolean('is_published')->default(true)->comment('Status publikasi');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->comment('Dibuat oleh user (admin)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
