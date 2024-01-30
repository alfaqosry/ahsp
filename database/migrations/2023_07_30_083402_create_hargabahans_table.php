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
        Schema::create('hargabahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahan_id');
            $table->foreign('bahan_id')->references('id')->on('daftarbahans')->nullable();
            $table->foreignId('tugas_id');
            $table->foreign('tugas_id')->references('id')->on('tugas')->nullable();
            $table->integer('harga');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargabahans');
    }
};
