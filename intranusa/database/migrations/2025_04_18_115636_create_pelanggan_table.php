<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('pelanggan_id'); // Primary key
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Hubungkan dengan tabel users
            $table->string('nama_pelanggan', 150);
            $table->string('email', 150);
            $table->string('lokasi_pemasangan', 150);
            // $table->string('paket', 150);
            $table->string('nik', 30);
            $table->string('no_handphone_wa', 20);
            $table->string('no_handphone_2', 20)->nullable();
            $table->string('npwp', 30)->nullable();
            $table->text('alamat_lengkap');
            $table->text('sumber_informasi')->nullable();

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // $table->string('order_id')->nullable();
            // $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            // $table->string('order_id')->nullable()->unique()->after('user_id'); // [TAMBAHAN]
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('cascade');


            // Tambahan kolom status dengan index
            $table->string('status_langganan')->default('pending')->index(); // pending, aktif, tidak aktif
            $table->string('status_notif')->default('pending')->index(); // pending, diproses

            $table->timestamps(); // Gunakan timestamps() standar untuk menghindari error
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
};
