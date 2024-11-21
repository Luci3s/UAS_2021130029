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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama karyawan
            $table->string('role'); // Role karyawan
            $table->string('gender'); // Gender (Laki-laki / Perempuan)
            $table->string('email')->unique(); // Email
            $table->string('phone_number'); // Nomor Telepon
            $table->date('hired_date'); // Tanggal Bergabung
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
