<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel services.
     * Tabel ini menyimpan informasi layanan laboratorium (sarana prasarana & konsultatif).
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['sarana_prasarana', 'konsultatif'])->comment('Kategori layanan');
            $table->string('title')->comment('Judul layanan');
            $table->text('description')->comment('Deskripsi layanan');
            $table->string('image_path')->nullable()->comment('Path gambar layanan');
            $table->string('icon')->nullable()->comment('Icon layanan');
            $table->integer('order')->default(0)->comment('Urutan tampilan');
            $table->boolean('is_active')->default(true)->comment('Status aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
