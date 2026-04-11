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
       Schema::create('detail_users', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('sekolah_id')->constrained()->onDelete('cascade');
    $table->string('no_hp');
    $table->text('alamat');
    $table->string('nama_pembimbing');
    $table->string('no_hp_pembimbing');
    $table->string('jenis_kelamin');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_users');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
};
