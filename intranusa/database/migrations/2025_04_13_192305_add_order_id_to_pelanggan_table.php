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
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->string('order_id')->nullable()->unique()->after('user_id'); // [TAMBAHAN]
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn('order_id');
});
}

};
