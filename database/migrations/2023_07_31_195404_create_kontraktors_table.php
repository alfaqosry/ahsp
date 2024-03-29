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
        Schema::create('kontraktors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_direktur');
            $table->string('nama_cv');
            $table->string('nik');
            $table->string('npwp');
            $table->string('no_akta_perusahaan');
            $table->string('status')->nullable();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraktors');
    }
};
