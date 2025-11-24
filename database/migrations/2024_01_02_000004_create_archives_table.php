<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('type')->comment('Tipe dokumen: penelitian atau pengabdian');
            $table->string('pdf_path')->comment('Path file PDF');
            $table->integer('file_size')->comment('Ukuran file dalam KB');
            $table->string('author')->comment('Penulis/peneliti');
            $table->integer('year')->comment('Tahun publikasi');
            $table->integer('download_count')->default(0)->comment('Jumlah unduhan');
            $table->boolean('is_published')->default(true)->comment('Status publikasi');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->comment('Dibuat oleh user (admin)');
            $table->timestamps();
        });

        // Add CHECK constraint for type column (PostgreSQL)
        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement("ALTER TABLE archives ADD CONSTRAINT archives_type_check CHECK (type IN ('penelitian', 'pengabdian'))");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
