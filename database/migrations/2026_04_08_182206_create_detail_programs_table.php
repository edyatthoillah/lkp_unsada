<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_programs', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel programs
            $table->foreignId('program_id')
                ->constrained('programs')
                ->onDelete('cascade');

            // Kolom utama
            $table->string('sub_program');
            $table->text('detail')->nullable();
            $table->decimal('harga', 12, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_programs');
    }
};
