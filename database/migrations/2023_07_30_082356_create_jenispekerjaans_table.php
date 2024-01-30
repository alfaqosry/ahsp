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
        Schema::create('jenispekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pekerjaan');
            $table->foreignId('permen_id');
            $table->foreign('permen_id')->references('id')->on('permens')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenispekerjaans');
    }
};
