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
        Schema::create('nagaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('cascade');
            $table->string('nama_nagari');
            $table->string('nama_wali_nagari');
            $table->string('kontak_wali_nagari');
            $table->string('alamat_kantor_nagari');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_jorong');
            $table->timestamps();

            $table->unique(['kecamatan_id', 'nama']);
            $table->index('kecamatan_id');
            $table->index('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nagaris');
    }
};
