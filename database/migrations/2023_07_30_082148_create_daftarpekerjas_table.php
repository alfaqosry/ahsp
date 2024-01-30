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
        Schema::create('daftarpekerjas', function (Blueprint $table) {
            $table->id();
            $table->string('pekerja');
            $table->string('kode');
            $table->foreignId('satuan_id');
            $table->foreign('satuan_id')->references('id')->on('satuans')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarpekerjas');
    }
};
