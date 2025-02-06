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
        Schema::create('bts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained('operators')->cascadeOnDelete();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete();
            $table->foreignId('nagari_id')->constrained('nagaris')->cascadeOnDelete();
            $table->foreignId('jorong_id')->constrained('jorongs')->cascadeOnDelete();
            $table->string('lokasi');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->enum('teknologi', ['2G', '3G', '4G', '4G+5G', '5G'])->default('4G');
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->string('tahun_bangun');
            $table->timestamps();

            $table->index('operator_id');
            $table->index('kecamatan_id');
            $table->index('nagari_id');
            $table->index('jorong_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bts');
    }
};
