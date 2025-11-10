<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel agendas.
     * Tabel ini menyimpan agenda kegiatan laboratorium.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul agenda');
            $table->text('description')->comment('Deskripsi agenda');
            $table->date('event_date')->comment('Tanggal acara');
            $table->time('event_time')->nullable()->comment('Waktu acara');
            $table->string('location')->nullable()->comment('Lokasi acara');
            $table->string('image_path')->nullable()->comment('Path gambar agenda');
            $table->boolean('is_active')->default(true)->comment('Status aktif');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->comment('Dibuat oleh user (admin)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
