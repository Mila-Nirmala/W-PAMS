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
        Schema::table('masa_pkls', function (Blueprint $table) {
        // 🔥 HAPUS FOREIGN KEY DULU
        $table->dropForeign(['pendaftaran_id']);

        // 🔥 BARU HAPUS KOLOM
        $table->dropColumn('pendaftaran_id');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('masa_pkls', function (Blueprint $table) {
        $table->foreignId('pendaftaran_id')->nullable()->constrained()->cascadeOnDelete();
    });
    }
};
