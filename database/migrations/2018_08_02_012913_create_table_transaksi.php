<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->dateTime('tgl_pesan');
            $table->string('no_transaksi', 50);
            $table->integer('id_pemesan')->unsigned();
            $table->string('ket', 255);
            $table->timestamps();
        });

        // set FK di kolom id_transaksi_dtl pd table transaksi_dtl
        // Schema::table('transaksi_dtl', function (Blueprint $table) {
        //     $table->foreign('id_transaksi')
        //           ->references('id_transaksi_dtl')
        //           ->on('transaksi_dtl')
        //           ->onDelete('cascade')
        //           ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('transaksi_dtl', function(Blueprint $table) {
        //     $table->dropForeign('transaksi_dtl_id_transaksi_foreign');
        // });

        Schema::dropIfExists('transaksi');
    }
}
