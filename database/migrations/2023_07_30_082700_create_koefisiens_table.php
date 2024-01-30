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
        Schema::create('koefisiens', function (Blueprint $table) {
            $table->id();
            $table->double('koefisien');
            $table->foreignId('bahan_id');
            $table->foreign('bahan_id')->references('id')->on('daftarbahans')->nullable();
            $table->foreignId('pekerjaan_id');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koefisiens');
    }
};
