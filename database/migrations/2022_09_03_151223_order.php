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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('id_meja');
            $table->integer('id_order');
            $table->integer('id_menu');
            $table->string('nama_pengguna');
            $table->integer('jumlah');
            $table->timestamp('waktu_order');
            $table->enum ('status',['dipesan','belum dibayar','down payment']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
