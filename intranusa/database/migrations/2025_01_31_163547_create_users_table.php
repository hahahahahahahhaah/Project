<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            // $table->string('nik')->unique()->nullable();
            // $table->string('npwp')->unique()->nullable();
            $table->string('password')->nullable();
            // $table->enum('status_langganan', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            // $table->enum('status_langganan', ['Pending', 'Aktif', 'Tidak aktif'])->default('Tidak aktif')->after('paket');
            // $table->enum('status_langganan', ['Pending', 'Aktif', 'Tidak aktif'])->default('Tidak aktif');
            $table->enum('status_langganan', ['Pending', 'Aktif', 'Tidak aktif', 'Disetujui'])->default('Tidak aktif');

            $table->string('profile_picture')->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
