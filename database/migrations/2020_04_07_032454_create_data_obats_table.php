<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_obats', function (Blueprint $table) {
            $table->bigIncrements('id_obat');
            $table->string('nama_obat');
            $table->bigInteger('penyakit_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('penyakit_id')->references('id_penyakit')->on('data_penyakits')->onDelete('cascade');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_obats');
    }
}
