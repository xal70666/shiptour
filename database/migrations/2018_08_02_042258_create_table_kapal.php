<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKapal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kapal', function (Blueprint $table) {
            $table->increments('id_kapal');
            $table->string('nama_kapal', 50);
            $table->string('alias_kapal', 10);
            $table->string('kelas', 10);
            $table->integer('kapasitas');
            $table->integer('id_nakhoda');
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

        Schema::dropIfExists('kapal');
    }
}
