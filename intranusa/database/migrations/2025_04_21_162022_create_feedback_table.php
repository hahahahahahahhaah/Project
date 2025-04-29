<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->tinyInteger('koneksi'); // 1-5
            $table->tinyInteger('puas_cs'); // 1-5
            $table->tinyInteger('puas_teknisi'); // 1-5
            $table->string('gangguan'); // enum: Tidak pernah, Jarang, ...
            $table->string('kecepatan'); // enum: Sangat sesuai, Sesuai, ...
            $table->string('harga'); // enum: Ya, sebanding / Tidak
            $table->string('rekomendasi'); // enum: Sangat mungkin, ...
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
