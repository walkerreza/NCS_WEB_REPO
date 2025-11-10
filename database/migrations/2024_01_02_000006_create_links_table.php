<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel links.
     * Tabel ini menyimpan link eksternal seperti Polinema, SINTA, dll.
     */
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul link');
            $table->string('url')->comment('URL tujuan');
            $table->string('icon')->nullable()->comment('Icon link');
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
        Schema::dropIfExists('links');
    }
};
