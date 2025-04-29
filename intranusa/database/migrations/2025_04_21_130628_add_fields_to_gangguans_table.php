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
        Schema::table('gangguans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
        $table->string('alamat')->nullable();
        $table->string('status')->default('menunggu'); // status: menunggu, diproses, selesai

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gangguans', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'alamat', 'status']);

        });
    }
};
