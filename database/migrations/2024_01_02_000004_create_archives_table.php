<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel archives.
     * Tabel ini menyimpan arsip dokumen penelitian dan pengabdian dalam format PDF.
     */
    public function up(): void
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul dokumen');
            $table->text('description')->comment('Deskripsi dokumen');
            $table->enum('type', ['penelitian', 'pengabdian'])->comment('Tipe dokumen');
            $table->string('pdf_path')->comment('Path file PDF');
            $table->integer('file_size')->comment('Ukuran file dalam KB');
            $table->string('author')->comment('Penulis/peneliti');
            $table->year('year')->comment('Tahun publikasi');
            $table->integer('download_count')->default(0)->comment('Jumlah unduhan');
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
        Schema::dropIfExists('archives');
    }
};
