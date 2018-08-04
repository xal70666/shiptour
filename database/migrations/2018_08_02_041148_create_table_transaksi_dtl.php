<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_dtl', function (Blueprint $table) {
            $table->increments('id_transaksi_dtl');
            $table->integer('harga');
            $table->integer('harga_total');
            $table->integer('id_transaksi')->unsigned();
            $table->integer('id_penumpang')->unsigned();
            $table->integer('id_perjalanan')->unsigned();
            $table->timestamps();

            // $table->foreign('id_penumpang')
            //       ->references('id_penumpang')
            //       ->on('penumpang')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
            //
            // $table->foreign('id_transaksi')
            //       ->references('id_transaksi')
            //       ->on('transaksi')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
            //
            // $table->foreign('id_perjalanan')
            //       ->references('id_perjalanan')
            //       ->on('perjalanan')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_dtl');
    }
}
