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
        Schema::create('jorongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nagari_id')->constrained('nagaris')->onDelete('cascade');
            $table->string('nama');
            
            $table->timestamps();

            $table->unique(['nagari_id', 'nama']);
            $table->index('nagari_id');
            $table->index('nama');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jorongs');
    }
};