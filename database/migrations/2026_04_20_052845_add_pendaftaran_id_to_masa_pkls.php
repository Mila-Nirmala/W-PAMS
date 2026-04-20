<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('masa_pkls', function (Blueprint $table) {
        $table->foreignId('pendaftaran_id')
              ->after('user_id')
              ->constrained('pendaftarans')
              ->cascadeOnDelete();
    });
}

public function down(): void
{
    Schema::table('masa_pkls', function (Blueprint $table) {
        $table->dropForeign(['pendaftaran_id']);
        $table->dropColumn('pendaftaran_id');
    });
}
};
