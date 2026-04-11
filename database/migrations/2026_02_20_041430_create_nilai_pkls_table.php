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
       Schema::create('nilai_pkls', function (Blueprint $table) {
    $table->id();
    $table->foreignId('sertifikat_id')->constrained()->onDelete('cascade');
    $table->integer('disiplin');
    $table->integer('kehadiran');
    $table->integer('kinerja');
    $table->integer('sikap');
    $table->integer('kerjasama');
    $table->integer('nilai_akhir'); 
    $table->string('grade');       
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_pkls');
    }
};
