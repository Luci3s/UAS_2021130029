<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama hewan
            $table->string('species'); // Jenis hewan (misal: Anjing, Kucing, dll.)
            $table->string('breed')->nullable(); // Ras hewan, bisa null jika tidak diketahui
            $table->integer('age')->nullable(); // Umur dalam tahun, bisa null
            $table->string('gender')->nullable(); // Gender hewan (male/female)
            $table->text('description')->nullable(); // Deskripsi hewan
            $table->string('image_url')->nullable(); // URL gambar hewan
            $table->boolean('is_adopted')->default(false); // Status adopsi (false untuk belum diadopsi)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
