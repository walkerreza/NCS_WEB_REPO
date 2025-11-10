<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk tabel comments.
     * Tabel ini menyimpan komentar dari guest dengan sistem moderasi.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('Nama komentator');
            $table->string('email', 100)->comment('Email komentator');
            $table->text('comment')->comment('Isi komentar');
            $table->string('page')->comment('Halaman tempat komentar dibuat');
            $table->boolean('is_approved')->default(false)->comment('Status persetujuan admin');
            $table->string('ip_address', 45)->comment('IP address komentator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
