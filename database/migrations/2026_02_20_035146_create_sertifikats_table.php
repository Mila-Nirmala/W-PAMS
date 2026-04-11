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
        Schema::create('sertifikats', function (Blueprint $table) {
        $table->id();
        $table->foreignId('masa_pkl_id')->constrained()->onDelete('cascade');
        $table->string('no_sertifikat')->unique();
        $table->date('tanggal_terbit');
        $table->string('kepala_kampus');
        $table->string('file_path')->nullable(); // Simpan file pdf
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikats');
    }
};
