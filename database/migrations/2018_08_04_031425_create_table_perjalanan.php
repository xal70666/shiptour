<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerjalanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjalanan', function (Blueprint $table) {
            $table->increments('id_perjalanan');
            $table->integer('id_kapal')->unsigned();
            $table->integer('id_asal')->unsigned();
            $table->integer('id_tujuan')->unsigned();
            $table->timestamps();


            // create foreign
            // $table->foreign('id_asal')
            //       ->references('id_destinasi')
            //       ->on('destinasi')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
            //
            // $table->foreign('id_tujuan')
            //       ->references('id_destinasi')
            //       ->on('destinasi')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
            //
            // $table->foreign('id_kapal')
            //       ->references('id_kapal')
            //       ->on('kapal')
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
        Schema::dropIfExists('perjalanan');
    }
}
