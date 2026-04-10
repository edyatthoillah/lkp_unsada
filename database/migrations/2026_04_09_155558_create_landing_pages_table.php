<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();

            // Branding
            $table->string('logo')->nullable();
            $table->string('nama_aplikasi')->nullable();

            // Hero Section
            $table->text('hero_section')->nullable();
            $table->string('image_hero')->nullable();

            // Kontak
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();

            // Tentang Kami
            $table->text('tentang_kami')->nullable();
            $table->string('foto_tentang_kami')->nullable();

            // Brosur
            $table->string('link_brosur')->nullable();

            // Footer
            $table->text('footer_deskripsi')->nullable();
            $table->text('alamat')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
