<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan'); // kolom id
            $table->string('nama_pelanggan', 150); // kolom nama pelanggan
            $table->string('email', 150); // kolom email
            $table->string('lokasi_pemasangan', 150); // kolom lokasi pemasangan
            $table->string('paket', 150); // kolom paket
            $table->string('nik', 30); // kolom NIK
            $table->string('no_handphone_wa', 20); // kolom no handphone WA
            $table->string('no_handphone_2', 20); // kolom no handphone 2
            $table->string('npwp', 30); // kolom NPWP
            $table->text('alamat_lengkap'); // kolom alamat lengkap
            $table->text('sumber_informasi'); // kolom sumber informasi
            $table->timestamps(0); // kolom created_at dan updated_at
            $table->string('status_notif')->default('pending'); // Sesuaikan default value

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
}
