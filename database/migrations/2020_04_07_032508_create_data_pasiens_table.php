<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->bigIncrements('id_pasien');
            $table->string('nama_pasien');
            $table->string('ttl');
            $table->integer('umur');
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('alamat');
            $table->date('tgl_datang');
            $table->string('gejala');
            $table->bigInteger('penyakit_id')->unsigned();
            $table->bigInteger('obat_id')->unsigned();
            $table->timestamps();

            $table->foreign('penyakit_id')->references('id_penyakit')->on('data_penyakits')->onDelete('cascade');
            $table->foreign('obat_id')->references('id_obat')->on('data_obats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pasiens');
    }
}
