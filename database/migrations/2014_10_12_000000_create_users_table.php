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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('username');
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('no_tlpn');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('surveyor');
            $table->integer('is_active')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
