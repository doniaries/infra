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
        Schema::create('data_jorongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nagari_id')->constrained('data_nagaris')->onDelete('cascade');
            $table->foreignId('jorong_id')->constrained('jorongs')->onDelete('cascade');
            $table->string('nama_kepala_jorong');
            $table->string('alamat');
            $table->string('kontak');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_jorong');
            $table->string('mata_pencaharian');
            $table->string('penghasilan_rata_rata');
            $table->string('sarana_kesehatan');
            $table->string('sarana_pasar');
            $table->integer('usia_produktif');
            $table->string('kegiatan_ekonomi');
            $table->timestamps();

            // Indeks untuk meningkatkan performa query
            $table->unique(['nagari_id', 'jorong_id']);
            $table->index('nagari_id');
            $table->index('jorong_id');
            $table->index('jumlah_penduduk');
            $table->index('usia_produktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jorongs');
    }
};
