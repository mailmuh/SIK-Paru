<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dokters', function (Blueprint $table) {
            $table->bigIncrements('id_dokter');
            $table->string('nama_dokter');
            $table->string('ttl');
            $table->string('alamat');
            $table->string('agama');
            $table->enum('spesialisasi',['Sp.P']);
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
        Schema::dropIfExists('data_dokters');
    }
}
