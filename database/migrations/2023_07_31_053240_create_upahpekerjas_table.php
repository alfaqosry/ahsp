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
        Schema::create('upahpekerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pekerja_id');
            $table->foreign('pekerja_id')->references('id')->on('daftarpekerjas')->nullable();
            $table->foreignId('tugas_id');
            $table->foreign('tugas_id')->references('id')->on('tugas')->nullable();
            $table->integer('upah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upahpekerjas');
    }
};
