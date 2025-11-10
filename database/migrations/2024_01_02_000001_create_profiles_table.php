<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel profiles.
     * Tabel ini menyimpan informasi profil laboratorium seperti visi misi dan struktur organisasi.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->enum('section', ['visi_misi', 'struktur_organisasi'])->comment('Bagian profil');
            $table->string('title')->comment('Judul bagian');
            $table->text('content')->comment('Konten/deskripsi');
            $table->string('image')->nullable()->comment('Path gambar (logo, struktur organisasi)');
            $table->integer('order')->default(0)->comment('Urutan tampilan');
            $table->boolean('is_active')->default(true)->comment('Status aktif/nonaktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
